<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\InvoiceTemp;
use App\Models\Profile;
use App\Models\Result;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Auth;
class InputData extends Component
{

    public $namaagen;
    public $username;
    public $userid;
    public $kredit;
    public $adminid;
    public $bolakbalik;
    public $nota;
    public $nomor = 'd-none';
    public $nominal;
    public $angka;
    public $pasaran;
    public $datainvoicetemp;
    public $datamarket;

    public function mount(){
        $this->adminid = Auth::guard('admin')->user()->id;
        $this->datamarket = Result::whereIn('status', [1,2])->get();
        $this->datainvoicetemp = InvoiceTemp::where('adminid', $this->adminid )->get();
    }

    public function render()
    {
        return view('livewire.input-data');
    }

    public function finddata()
    {
        $user = User::where('username', $this->username)->first();
        $this->kredit = User::with('profile')->where('username', $this->username)->first();
        if($user){
            $this->nomor = 'd-block';
            $this->namaagen = $user->name;
            $this->userid = $user->id;
            $this->kredit = $this->kredit->profile->kredit;
        }else {
            $this->namaagen = 'User Tidak Ada';
            $this->nomor = 'd-none';
            $this->kredit = 0;
        }

    }

    public function adddata(){
        $nonota = Carbon::now()->format('Y').Carbon::now()->format('m').Carbon::now()->weekOfMonth.$this->nota;
        $invoiceid = Carbon::now()->format('h').Carbon::now()->minute.Auth::guard('admin')->user()->id;
        $kode = strlen($this->angka).'D';
        $diskon = games::where('kode', $kode)->first();
        $validatedData = $this->validate([
            'pasaran' => 'required',
            'angka' => 'required|min:2',
            'nominal' => 'required|gt:0',
            'nota' => 'required',
        ],
            [
                'pasaran.required' => 'Silahkan Dipilih pasaran',
                'nota.required' => 'no nota tdk blh kosong',
                'angka.required' => 'tdk boleh kosong',
                'angka.min' => 'Min 2 Angka',
                'nominal.required' => 'tdk boleh 0',
                'nominal.gt' => 'min taruhan 1IDR'
            ]);

        $invoiceTemp = new InvoiceTemp;
        $invoiceTemp->invoice_id = $invoiceid;
        $invoiceTemp->result_id = $this->pasaran;
        $invoiceTemp->user_id = $this->userid;
        $invoiceTemp->kode = $kode;
        $invoiceTemp->posisi = 0;
        $invoiceTemp->data = $this->angka;
        $invoiceTemp->amount = $this->nominal;
        $invoiceTemp->hadiah = 0;
        $invoiceTemp->diskon = $diskon->diskon;
        $invoiceTemp->kei = 0;
        $invoiceTemp->winlose = 0;
        $invoiceTemp->total = $this->nominal - ($this->nominal * ($diskon->diskon / 100));
        $invoiceTemp->is_win = 0;
        $invoiceTemp->status = 0;
        $invoiceTemp->tgl_Beli = Carbon::now();
        $invoiceTemp->nonota = $nonota;
        $invoiceTemp->adminid = Auth::guard('admin')->user()->id;
        $invoiceTemp->save();

        $this->datainvoicetemp = InvoiceTemp::where('adminid', $this->adminid )->get();
        $this->angka = '';
        $this->nominal = '';
    }

    public function tambahdata(){
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


        $nonota = Carbon::now()->format('Y').Carbon::now()->format('m').Carbon::now()->weekOfMonth.$this->nota;
        $invoiceid = Carbon::now()->format('h').Carbon::now()->minute.Auth::guard('admin')->user()->id;
        $kode = strlen($this->angka).'D';
        $diskon = games::where('kode', $kode)->first();
        $invoiceTemp = new InvoiceTemp;
        $dataarray = array();
        $validatedData = $this->validate([
            'pasaran' => 'required',
            'angka' => 'required|min:2',
            'nominal' => 'required|gt:0',
            'nota' => 'required',
        ],
            [
                'pasaran.required' => 'Silahkan Dipilih pasaran',
                'nota.required' => 'no nota tdk blh kosong',
                'angka.required' => 'tdk boleh kosong',
                'angka.min' => 'Min 2 Angka',
                'nominal.required' => 'tdk boleh 0',
                'nominal.gt' => 'min taruhan 1IDR'
            ]);

        if($this->bolakbalik == true){

            $data = implode("," , str_split($this->angka, 1));
            $nomorArray = explode(',',$data);
            $collection = collect($nomorArray)->permute();
            $total = $collection->unique()->count();
            $unique = $collection->unique()->toArray();
            $test = array_merge($unique);
            for($i = 0; $i < $total; $i++){
                $datainsert[] = array(
                    'invoice_id' => $invoiceid,
                    'result_id' => $this->pasaran,
                    'user_id' => $this->userid,
                    'kode' => $kode,
                    'posisi' => 0,
                    'data' => implode("",$test[$i]),
                    'amount' => $this->nominal,
                    'hadiah' => 0,
                    'diskon' => $diskon->diskon,
                    'kei' => 0,
                    'winlose' => 0,
                    'total' => $this->nominal - ($this->nominal * ($diskon->diskon / 100)),
                    'is_win' => 0,
                    'status' => 0,
                    'tgl_Beli' => Carbon::now(),
                    'nonota' => $nonota,
                    'adminid' => Auth::guard('admin')->user()->id,
                );

            }
            InvoiceTemp::insert($datainsert);
            $this->datainvoicetemp = InvoiceTemp::where('adminid', $this->adminid )->get();
            $this->angka = '';
            $this->nominal = '';
            $this->bolakbalik = false;
        }else {

            $invoiceTemp->invoice_id = $invoiceid;
            $invoiceTemp->result_id = $this->pasaran;
            $invoiceTemp->user_id = $this->userid;
            $invoiceTemp->kode = $kode;
            $invoiceTemp->posisi = 0;
            $invoiceTemp->data = $this->angka;
            $invoiceTemp->amount = $this->nominal;
            $invoiceTemp->hadiah = 0;
            $invoiceTemp->diskon = $diskon->diskon;
            $invoiceTemp->kei = 0;
            $invoiceTemp->winlose = 0;
            $invoiceTemp->total = $this->nominal - ($this->nominal * ($diskon->diskon / 100));
            $invoiceTemp->is_win = 0;
            $invoiceTemp->status = 0;
            $invoiceTemp->tgl_Beli = Carbon::now();
            $invoiceTemp->nonota = $nonota;
            $invoiceTemp->adminid = Auth::guard('admin')->user()->id;
            $invoiceTemp->save();

            $this->datainvoicetemp = InvoiceTemp::where('adminid', $this->adminid )->get();
            $this->angka = '';
            $this->nominal = '';

        }
    }


    public function deleteInvoice($id){

        $deleteInvoiceTemp = InvoiceTemp::find($id);
        $deleteInvoiceTemp->delete();
        $this->datainvoicetemp = InvoiceTemp::where('adminid', $this->adminid )->get();
        return redirect()->back();

    }


    public function hapusinvoice(){
        $adminid = Auth::guard('admin')->user()->id;
        $hapusinvoice = InvoiceTemp::where('adminid', $adminid);
        $hapusinvoice->delete();
        $this->datainvoicetemp = InvoiceTemp::where('adminid', $this->adminid )->get();
        return redirect()->back();
    }

    public function saveinvoice(){
        //check Market
        $checkMarket = Result::find($this->pasaran);
        if($checkMarket){
            //Check Kredit
            if($this->kredit < $this->datainvoicetemp->sum('total')){
                session()->flash('danalimit','Kredit Tidak Cukup');
            }else{
                $jlh = $this->datainvoicetemp->count('data');
                DB::beginTransaction();
                $invoice = new Invoices;
                $invoice->user_id = $this->userid;
                $invoice->result_id = $this->pasaran;
                $invoice->amount = $this->datainvoicetemp->sum('amount');
                $invoice->total = $this->datainvoicetemp->sum('total');
                $invoice->diskon = $this->datainvoicetemp->sum('amount') - $this->datainvoicetemp->sum('total');
                $invoice->winlose = 0;
                $invoice->status = 0;
                $invoice->adminid = $this->adminid;
                $invoice->nonota = $this->datainvoicetemp->pluck('nonota')->first();
                $invoice->save();

                foreach($this->datainvoicetemp as $data){
                    $datainserts[] = array(
                        'invoice_id' => $invoice->id,
                        'result_id' => $this->pasaran,
                        'user_id' => $this->userid,
                        'kode' => $data->kode,
                        'posisi' => 0,
                        'data' => $data->data,
                        'amount' => $data->amount,
                        'hadiah' => 0,
                        'diskon' => $data->diskon,
                        'kei' => 0,
                        'winlose' => 0,
                        'total' => $data->amount - ( $data->amount * ($data->diskon / 100)),
                        'is_win' => 0,
                        'status' => 2,
                        'tgl_beli' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                }

                InvoiceDetail::insert($datainserts);
                Profile::where('user_id', $this->userid)->update(['kredit' => $this->kredit - $this->datainvoicetemp->sum('total')]);
                InvoiceTemp::where('adminid',$this->adminid)->delete();
                DB::commit();
                $this->datainvoicetemp = InvoiceTemp::where('adminid', $this->adminid )->get();
                $this->nota = '';
                session()->flash('success', 'Invoice Berhasil Disimpan');
            }

        }else {
            session()->flash('Tutup', 'Pasaran Sudah Tutup');
        }


    }
}
