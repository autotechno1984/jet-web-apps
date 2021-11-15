<?php

namespace App\Http\Controllers;

use App\Models\bank;
use App\Models\bankDetail;
use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\InvoiceTemp;
use App\Models\Profile;
use App\Models\Result;
use App\Models\transaksidepowd;
use App\Models\User;
use App\Models\userBankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class GeneralController extends Controller
{

    public function userlimit()
    {

    }

    public function togel($id) {

        $userid = Auth::user()->id;
//        $markets = Result::where('status', 1)->get();
        $tempInv = InvoiceTemp::where('user_id', $userid)->where('result_id',$id)->orderBy('id','desc')->paginate(10);
//        $checkInv = InvoiceTemp::where('user_id', $userid)->first();
        $totaldiskon = DB::table('invoice_temps')->select(DB::raw('sum(amount) as jumlah'),DB::raw('sum(amount * (diskon/100)) as total'))->where('user_id', $userid)->where('result_id',$id)->first();

        return view('front.togel',compact('id','tempInv', 'totaldiskon'));


    }

    public function angka(Request $request){

        $validated = $request->validate([
            'nomor' => 'required|min:2',
            'nominal' => 'required|numeric'
        ]);

        $user_id = Auth::user()->id;
        $kode = Str::length($request->nomor)."D";
        $games = games::where('kode', $kode)->first();
        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 ));
        if($kredituse > $checkkredit){
            return redirect()->back()->with('error','Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        }else {
            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = 0;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();

            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }



    }

    public function angkabb(Request $request) {
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;

        $validated = $request->validate([
            'nomor' => 'required|min:2',
            'nominal' => 'required|numeric'
        ]);

        $kode = Str::length($request->nomor)."D";
        $games = games::where('kode', $kode)->first();

        $diskon = $games->diskon;

        Collection::macro('permute', function () {
            if ($this->isEmpty()) {
                return new static([[]]);
            }

            return $this->flatMap(function ($value, $index) {
                return (new static($this))
                    ->forget($index)
                    ->values()
                    ->permute()
                    ->map(function ($item) use ($value) {
                        return (new static($item))->prepend($value);
                    });
            });
        });
        $result_id = $request->id;
        $data = implode("," , str_split($nomor, 1));
        $nomorArray = explode(',',$data);
        $collection = collect($nomorArray)->permute();
        $total = $collection->unique()->count();
        $unique = $collection->unique()->toArray();
        $test = array_merge($unique);

        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = ($request->nominal - ($request->nominal * ($games->diskon /100 ))) * $total ;

        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        }else {
            $dataArray = array();
            for ($b=0; $b<$total; $b++) {
                # code...
                //  $test2 = implode("", $test[$i]);
                $dataArray[] = array(
                    'invoice_id' => '0',
                    'result_id' => $result_id,
                    'user_id' => $user_id,
                    'kode' => $kode,
                    'posisi' => 0,
                    'data' => implode("", $test[$b]),
                    'amount' => $nominal,
                    'diskon' => $diskon,
                    'kei' => 0,
                    'winlose' => 0,
                    'is_win' => 0,
                    'status' => 2,
                    'tgl_beli' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),

                );
            }

            InvoiceTemp::insert($dataArray);


            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);

            return redirect()->back();
        }

    }

    public function colokbebas(Request $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;
        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $kode = "CLB";
        $games = games::where('kode', $kode)->first();

        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;

        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {

            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = 0;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();

            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);

            return redirect()->back();
        }
    }

    public function colokmacau(Request $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;
        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $kode = "CLM";
        $games = games::where('kode', $kode)->first();


        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;

        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {
            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = 0;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();

            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }

    }

    public function colokjitu(Request $request){

        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;

        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $kode = "CLJ";
        $games = games::where('kode', $kode)->first();

        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;

        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {

            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = $request->posisi;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();
            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }
    }

    public function coloknaga(Request  $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;

        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $kode = "CLN";
        $games = games::where('kode', $kode)->first();

        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;

        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {

            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = 0;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();

            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }
    }

    public function limapuluh(Request  $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;

        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $kode = "5050";
        $games = games::where('kode', $kode)->first();


        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;
        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {


        $invoicetemp = new InvoiceTemp();
        $invoicetemp->invoice_id = 0;
        $invoicetemp->result_id = $request->id;
        $invoicetemp->user_id = Auth::user()->id;
        $invoicetemp->kode = $kode;
        $invoicetemp->posisi = 0;
        $invoicetemp->data = $request->nomor;
        $invoicetemp->amount = $request->nominal;
        $invoicetemp->diskon = $games->diskon;
        $invoicetemp->kei = $games->kei;
        $invoicetemp->winlose = 0;
        $invoicetemp->is_win = 0;
        $invoicetemp->status = 2;
        $invoicetemp->tgl_beli = now();
        $invoicetemp->save();
            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);

        return redirect()->back();
        }
    }

    public function limapuluhsp(Request $request){

        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;
        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $kode = "50SP";
        $games = games::where('kode', $kode)->first();

        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;
        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {

            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = $request->posisi;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();
            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }
    }

    public function limapuluhkb(Request $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;
        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $kode = "50KB";
        $games = games::where('kode', $kode)->first();


        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;
        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {
            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = $request->posisi;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();
            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }
    }

    public function macau(Request $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;
        $validated = $request->validate([
            'nomor' => 'required|min:1',
            'nominal' => 'required|numeric'
        ]);

        $nomor = $request->nomor . '-' . $request->nomor2;

        $kode = "MCU";
        $games = games::where('kode', $kode)->first();


        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;
        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {
            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = $request->posisi;
            $invoicetemp->data = $nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();
            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }
        }

    public function dasar(Request $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;

        $validated = $request->validate([
            'nomor' => 'required|min:2',
            'nominal' => 'required|numeric'
        ]);

        $kode = "DSR";
        $games = games::where('kode', $kode)->first();

        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;
        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {
            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = 0;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();
            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }
    }

    public function shio(Request  $request){
        $nomor = $request->nomor;
        $user_id = Auth::user()->id;
        $nominal = $request->nominal;


        $validated = $request->validate([
            'nomor' => 'required|min:2',
            'nominal' => 'required|numeric'
        ]);

        $kode = "SHIO";
        $games = games::where('kode', $kode)->first();

        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $kredituse = $request->nominal - ($request->nominal * ($games->diskon /100 )) ;
        if($kredituse > $checkkredit) {
            return redirect()->back()->with('error', 'Maaf Kredit Anda Tidak Cukup, Silahkan melakukan Deposit');
        } else {
            $invoicetemp = new InvoiceTemp();
            $invoicetemp->invoice_id = 0;
            $invoicetemp->result_id = $request->id;
            $invoicetemp->user_id = Auth::user()->id;
            $invoicetemp->kode = $kode;
            $invoicetemp->posisi = 0;
            $invoicetemp->data = $request->nomor;
            $invoicetemp->amount = $request->nominal;
            $invoicetemp->diskon = $games->diskon;
            $invoicetemp->kei = $games->kei;
            $invoicetemp->winlose = 0;
            $invoicetemp->is_win = 0;
            $invoicetemp->status = 2;
            $invoicetemp->tgl_beli = now();
            $invoicetemp->save();
            Profile::where('user_id', $user_id)
                ->update([ 'kredit' => $checkkredit - $kredituse ]);
            return redirect()->back();
        }
        }

    public function deleteorder($orderid){

        $user_id = Auth::user()->id;
        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $invoiceTemp = InvoiceTemp::where('id', $orderid)->where('user_id', $user_id)->first();
        $kredituse = $invoiceTemp->amount - ($invoiceTemp->amount * ($invoiceTemp->diskon /100));
        Profile::where('user_id', $user_id)
            ->update([ 'kredit' => $checkkredit + $kredituse ]);
        InvoiceTemp::where('id', $orderid)->where('user_id', $user_id)->delete();
        return redirect()->back();
    }

    public function deleteorderall(Request $request){
        $result_id = $request->id;
        $user_id = Auth::user()->id;
        $checkkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $invoiceTemp = InvoiceTemp::select('amount', DB::raw('amount * (diskon/100) as diskon'))->where('result_id', $result_id)->where('user_id', $user_id)->get();
        $totalkredit = $invoiceTemp->sum('amount');
        $totaldiskon = $invoiceTemp->sum('diskon');
        $total = $totalkredit - $totaldiskon;

        Profile::where('user_id', $user_id)
            ->update([ 'kredit' => $checkkredit + $total ]);

        InvoiceTemp::where('user_id', $user_id)->delete();

        return redirect()->back();
    }

    public function createinvoice(Request $request){
        $user_id = Auth::user()->id;
        $resultid = $request->id;

        $invoicetemp = InvoiceTemp::where('result_id', $resultid)->where('user_id', $user_id)->get();
        $invoicetempdata = InvoiceTemp::where('result_id', $resultid)->where('user_id', $user_id)->first();
        $total = $invoicetemp->sum('amount');
        $diskon = $invoicetemp->sum('diskon');


        $validated = $request->validate([

        ]);

        DB::transaction(function () use($user_id, $resultid, $total, $diskon,  $invoicetemp) {

            $invoice = new Invoices();
            $invoice->user_id = $user_id;
            $invoice->result_id = $resultid;
            $invoice->total = $total;
            $invoice->diskon = $diskon;
            $invoice->winLose = 0;
            $invoice->status = 0;
            $invoice->tgl_invoice = now();
            $invoice->save();

            foreach($invoicetemp as $data)
            DB::table('invoice_details')->insert([
               'invoice_id' => $invoice->id,
                'result_id' => $resultid,
                'kode' => $data->kode,
                'posisi' => $data->posisi,
                'data' => $data->data,
                'amount' => $data->amount,
                'hadiah' => $data->hadiah,
                'diskon' => $data->diskon,
                'kei' => $data->kei,
                'winlose' => 0,
                'is_win' => 0,
                'status' => 2,
                'tgl_beli' => now(),
            ]);

        });

        InvoiceTemp::where('user_id', $user_id)->delete();
        return redirect()->back();

    }

    public function transaksi(){
        $user_id = Auth::user()->id;
        $bank = bankDetail::where('status', 1)->get();
        $banks = bank::get();
        $userBankDetail = userBankDetail::where('user_id',$user_id)->get();
        $depositpending = transaksidepowd::where('user_id', $user_id)->where('kategori','DEPO')->where('status',2)->first();
        $wdpending = transaksidepowd::where('user_id', $user_id)->where('kategori','WD')->where('status',2)->first();
        return view('front.transaksi', compact('bank','banks','userBankDetail','depositpending','wdpending'));

    }

    public function datarekeninguser(Request $request){
        $validated = $request->validate([
            'bankid' => 'required',
            'nomorrekening' => 'required|min:3',
            'namarekening' => 'required|min:3',
        ]);
        $bankdetail = new userBankDetail();
        $user_id = Auth::user()->id;

        $bankid = $request->bankid;
        $bankdetail->user_id = Auth::user()->id;
        $getdatabank = bank::where('id', $bankid)->first();
        $checkakunbank = userBankDetail::where('user_id', $user_id)->count();
        $num = (int)$checkakunbank;

        if($num >= 3){
            return redirect()->back()->with('error', 'Rekening anda tidak bisa lebih dari 3.');

        } else {

            $userbank = new userBankDetail();
            $userbank->user_id = $user_id;
            $userbank->kategori = $getdatabank->kategori;
            $userbank->nama = $getdatabank->nama;
            $userbank->nama_bank = $request->namarekening;
            $userbank->nomor_bank = $request->nomorrekening;
            $userbank->save();

            return redirect()->back()->with('success', 'Data Rekening Sudah Ditambahkan.');
        }

    }

    public function deposit(Request $request) {

        $validated = $request->validate([
            'nominal' => 'required|min:3'
        ]);
        $user_id = Auth::user()->id;
        $bankid = $request->tujuanbank;
        $userbankid = $request->sumberbank;
        $checkdeposit = transaksidepowd::where('user_Id',$user_id)->where('kategori','DEPO')->where('status',2)->count();

        if($checkdeposit == 1){
            return redirect()->back()->with('error','ada deposit pending');
        } else {
            $transaksi = new transaksidepowd();

            $transaksi->user_id = $user_id;
            $transaksi->kategori = 'DEPO';
            $transaksi->amount = $request->nominal;
            $transaksi->id_bank_detail = $bankid;
            $transaksi->user_bank_detail = $userbankid;
            $transaksi->status = '2';
            $transaksi->save();

            return redirect()->back()->with('success', 'Deposit anda sedang diproses');
        }

    }

    public function withdraw(Request $request){
        $validated = $request->validate([
           'nominal' => 'required|min:3'
        ]);
        $user_id = Auth::user()->id;
        $userbankid = $request->sumberbank;
        $userkredit = Profile::where('user_id',$user_id)->pluck('kredit')->first();
        $wdamount = $request->nominal;
        $total = (float) $userkredit - (float) $wdamount;
        $checkwd = transaksidepowd::where('user_Id',$user_id)->where('kategori','WD')->where('status',2)->count();


        if($total < 0)
        {
           return redirect()->back()->with('error', 'Silahkan Kurangi Jumlah penarikan anda');
        }else

            Profile::where('user_id', $user_id)->update([
               'kredit' => $total,
            ]);

            $transaksi = new transaksidepowd();

            $transaksi->user_id = $user_id;
            $transaksi->kategori = 'WD';
            $transaksi->amount = $wdamount * -1;
            $transaksi->id_bank_detail = 0;
            $transaksi->user_bank_detail = $userbankid;
            $transaksi->status = '2';
            $transaksi->save();

            return redirect()->back()->with('success','Pengajuan penarikan dana anda sedang diproses....');
        }

    public function admintransaksi(){
        $depopending = transaksidepowd::where('kategori', 'DEPO')->where('status',2)->paginate(12);
        $wdpending = transaksidepowd::where('kategori', 'WD')->where('status',2)->paginate(12);

        return view('backend.transaksi',compact('depopending','wdpending'));
    }

    public function depositreject($id){

        $transaki = transaksidepowd::where('id', $id)->update([
           'catatan' => 'Deposit Ditolak',
           'approvedby' => Auth::user()->id,
           'status' => '0',
           'date_approved' => now(),
        ]);

        return redirect()->back()->with('error','Deposit Ditolak');
    }

    public function depositapproved($id){

        $user_id = Auth::user()->id;

        $useridrequest = transaksidepowd::where('id', $id)->pluck('user_id')->first();
        $userkredit = Profile::where('user_id', $useridrequest)->pluck('kredit')->first();
        $depositamount = transaksidepowd::where('id', $id)->pluck('amount')->first();
        $total = (float) $userkredit + (float) $depositamount;

        $updatekredit = Profile::where('user_id', $useridrequest)->update([
           'kredit' => $total
        ]);

        $transaki = transaksidepowd::where('id', $id)->update([
            'catatan' => 'Deposit berhasil',
            'approvedby' => Auth::user()->id,
            'status' => '1',
            'date_approved' => now(),
        ]);

        return redirect()->back()->with('success','Deposit Berhasil');
    }

    public function withdrawreject($id){

        $useridrequest = transaksidepowd::where('id', $id)->pluck('user_id')->first();
        $userkredit = Profile::where('user_id', $useridrequest)->pluck('kredit')->first();
        $wdamount = transaksidepowd::where('id', $id)->pluck('amount')->first() * -1;
        $total = (float) $userkredit + (float) $wdamount;
        $updatekredit = Profile::where('user_id', $useridrequest)->update([
            'kredit' => $total
        ]);

        $transaki = transaksidepowd::where('id', $id)->update([
            'catatan' => 'Penarikan ditolak',
            'approvedby' => Auth::user()->id,
            'status' => '0',
            'date_approved' => now(),
        ]);

        return redirect()->back()->with('error', 'Penarikan Ditolak');
    }

    public function withdrawapproved($id){

        $transaki = transaksidepowd::where('id', $id)->update([
            'catatan' => 'penarikan berhasil',
            'approvedby' => Auth::user()->id,
            'status' => '1',
            'date_approved' => now(),
        ]);

        return redirect()->back()->with('success', 'Penarikan Berhasil');
    }

    public function statement() {

        return view('front.statement');
    }

    public function gantipassword(){

        return view('front.gantipassword');
    }

    public function gantipasswordbaru(Request $request){

        $user_id = Auth::user()->id;
        $checkpass = Auth::user()->password;
        $passwordlama = $request->passwordlama;
        $passwordbaru = $request->passwordbaru;
        $passwordkonfirmasi = $request->passwordkonfirmasi;

        if(! Hash::check($passwordlama, $checkpass)){
            return redirect()->back()->with('error','Password Lama Tidak Cocok');
        }else {
            if($passwordbaru == $passwordkonfirmasi){
                User::where('id', $user_id)->update([
                   'password' => Hash::make($passwordbaru)
                ]);
                return redirect()->back()->with('success','Password Telah diganti..');
            } else {
                return redirect()->back()->with('error', 'Password Baru Dan Password Konfirmasi Tidak Sesuai');
            }

        }


    }
}
