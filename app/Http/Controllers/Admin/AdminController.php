<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
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

    function tagihanmember(){
        return view('backend.tagihanmember');
    }

    function tagihanmemberdetail($id){

        return view('backend.tagihanmemberdetail', compact('id'));
    }
}
