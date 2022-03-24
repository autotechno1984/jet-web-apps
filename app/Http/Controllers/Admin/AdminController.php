<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\bencut;
use App\Models\Contact;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\Result;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{
    function check(Request $request){
        $request->validate([
            'username'=>'required|exists:admins,username',
            'password'=> 'required|min:5|max:15',
        ],[
            'username.exists' => 'this username is not exist on data'
        ]);


        $creds =  array_merge($request->only('username', 'password'),['bann' => 1]);
        if( Auth::guard('admin')->attempt($creds) ) {
            return redirect()->route('admin.home');
        }else {
            return redirect()->route('admin.login')->with('fail','Username dan password tidak ada');
        }
    }

    function home(){
        $result = Result::where('status',1)->get();
        $invoicedetail = InvoiceDetail::where('status',2)->get();

        return view("backend.dashboard",compact('result','invoicedetail'));
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    function websetting() {
        $video = Video::orderBy('id','Desc')->paginate(10);
        $dataContact = Contact::all();
        $banner = banner::where('status', 1)->get();
        return view('backend.websitesetting',compact('dataContact','banner', 'video'));
    }

    function addcontact(Request $request) {

        $validated = $request->validate([
            'medsos' => 'required|unique:contacts,aplikasi',
            'url' => 'required',
        ]);

        $contact = new Contact;
        $contact->aplikasi = $request->medsos;
        $contact->url = $request->url;
        $contact->save();

        return redirect()->route('admin.websetting');
    }

    function addbanner(Request $request){



        $validated = $request->validate([
            'posisi' => 'required',
            'namabanner' => 'required',
            'banner' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
            if($request->hasFile('banner')){
                $name = $request->file('banner')->getClientOriginalName();
                $path = $request->file('banner')->storeAs('public/img', $name);

                $banner = new banner;
                $banner->posisi = $request->posisi;
                $banner->nama = $request->namabanner;
                $banner->file = $name;
                $banner->status = 1;
                $banner->save();
                return redirect()->route('admin.websetting');

            }
//
    }

    function addvideo(Request $request){

        $validated = $request->validate([
            'periode' => 'required',
            'url' => 'required'
        ]);


        $video = new Video;
        $video->periode = $request->periode;
        $video->url = $request->url;
        $video->save();

        return redirect()->route('admin.websetting');
    }

    function laporanByOmset()
    {
        return view('Laporan.laporanomset');
    }


    function wlsubagen(){
        return view('Laporan.winlosesubagen');
    }
    function winloseagen()
    {
        return view('Laporan.winloseagen');
    }

    function winloseagendetail($id)
    {
        $users = User::all();
        $invoice = Invoices::select('user_id',\DB::raw('count(id) as jumlah'),\DB::raw('sum(amount) as omset'), \DB::raw('sum(total) as total'), \DB::raw('sum(winLose) as winlose'), \DB::raw('(sum(amount)-sum(total)) as diskon'))
            ->where('result_id', $id)->groupBy('user_id')->get();
        return view('Laporan.winlosedetail', compact('id','invoice', 'users'));

    }

    function winloseinvoicedetail($id, $resultid)
    {
        $users = User::all();
        $invoice = Invoices::where('user_id', $resultid)->where('result_id', $id)->get();
        return view('Laporan.winloseinvoicedetail',compact('invoice', 'id','resultid','users'));
    }

    function invoicedetailuser($id){
        $invoicedetail = InvoiceDetail::where('invoice_id', $id)->get();
        return view('Laporan.invoicedetailuser',compact('invoicedetail'));
    }
    function adminlist()
    {
        return view('backend.usermember');
    }

    function tabelshio()
    {
        return view('backend.tableshio');
    }

    function inputhasil()
    {
        return view('backend.inputhasil');
    }

    function bank()
    {
        return view('backend.bank');
    }

    function inputtogel()
    {
        return view('backend.inputhasiltogel');
    }

    function liveresult()
    {
        return view('backend.liveresult');
    }

    function hitungan()
    {
        return view('backend.hitungan');
    }

    function export($id){
        $data = Result::find($id);
        $invdetail = InvoiceDetail::where('result_id', $id)->get();
        $user = User::select('id','username')->get();
        $pdf = PDF::loadView('print.laporanpdfomset',compact('data','invdetail','user'));
        return $pdf->download('LaporanOmset-Periode-'.$id.'.pdf');
    }

    function exportwlsubagen($date){

        $pasaran = Result::all();
        $result = Result::where(\DB::raw('DATE_FORMAT(tgl_periode, "%Y-%m-%d")'),$date)->limit(10)->pluck('id');
        $invoice = Invoices::whereIn('result_id', $result)->get();
        $invoiceUser = Invoices::whereIn('result_id', $result)->groupBy('user_id')->pluck('user_id')->toArray();
        $invoiceDetails = InvoiceDetail::whereIn('result_id', $result)->where('is_win',1)->get();
        $groups  = $invoice->groupBy('user_id');
        $datauser = User::all();
        $user = User::whereIn('id', $invoiceUser)->get();
        $userref = User::select('id','referallid')->whereNull('uplineid')->get();
        $userupline = User::select('uplineid')->whereNotNull('uplineid')->groupBy('uplineid')->get();
        $upline = User::select('uplineid')->whereNotNull('uplineid')->groupBy('uplineid')->pluck('uplineid')->toArray();
        $dataagen = User::select('id','referallid')->get();
        $agen = $userref->whereNotIn('referallid', $upline);
        $agens = $agen->whereIn('id', $invoiceUser);


        $groupwithcount = $groups->map(function ($group) {

            return [
                'user_id' => $group->first()['user_id'], // opposition_id is constant inside the same group, so just take the first or whatever
                'amount' => $group->sum('amount'),
                'total' => $group->sum('total'),
                'winLose' => $group->sum('winLose'),
            ];

        });

        return view('Laporan.laporanwlsubagen', compact('invoice', 'groupwithcount', 'date', 'result', 'pasaran', 'user', 'invoiceDetails','userref', 'invoiceUser', 'userupline', 'datauser','dataagen','agen', 'agens'));

    }

    function tagihanmember(){
        return view('backend.tagihanmember');
    }

    function tagihanmemberdetail($id){

        return view('backend.tagihanmemberdetail', compact('id'));
    }

    function bencut(){
        $no = 1;
        $bencut = bencut::orderBy('tanggal', 'asc')->get();
        return view('backend.bencut',compact('bencut', 'no'));
    }

    function bencutbaru(){
        return view('backend.bencuttambah');
    }

    function tambahbencut(Request $request){

        $request->validate([
           'tanggal' => 'required',
           'gambar' => 'required|mimes:jpeg,jpg,png|max:300'
        ],[
            'tanggal.required' => 'silahkan di pilih tanggal',
            'gambar.required' => 'blm ada foto yang di pilih'
        ]);

        $imagename = 'img/'.time().$request->gambar->getClientOriginalName();
        $savedata = new bencut;
        $savedata->tanggal = $request->tanggal;
        $savedata->keterangan = $request->keterangan;
        $savedata->filename =  $imagename;
        $savedata->save();
        $request->gambar->move(public_path('img'), $imagename);
        return redirect()->route('admin.bencut');
    }

    function bencuthapussemua(){
        $deleteall = bencut::all();
        foreach($deleteall as $data){
            \File::delete(public_path($data->filename));
        }
        bencut::truncate();
        return redirect()->route('admin.bencut');
    }

    function editbencut($id){
        $bencut = bencut::find($id);
        \File::delete(public_path($bencut->filename));
        $bencut->delete();
        return redirect()->route('admin.bencut');
    }

    function inputmanual(){
        return view('backend.inputmanual');
    }

}
