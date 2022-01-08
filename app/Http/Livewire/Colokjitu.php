<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\Profile;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Auth;

class Colokjitu extends Component
{
    public $nomor = array();
    public $amount = array();
    public $posisi = array();
    public $hadiah;
    public $diskon;
    public $pasaran;


    public function mount($id)
    {
        $this->nomor = ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 0];
        $games = games::select('hadiah', 'diskon')->where('kode', 'CLJ')->get();
        $this->hadiah = $games->pluck('hadiah')->first();
        $this->diskon = $games->pluck('diskon')->first();
        $this->pasaran = $id;
    }

    public function render()
    {
        return view('livewire.colokjitu');
    }


    public function createinvoice()
    {
        $kredituse = 0;
        $res = array_filter($this->posisi, function($value) {
            return ($value != 0);
        });

        foreach ($res as $data => $value) {
                $validateData = $this->validate(
                    [   'posisi.'.$data => 'gt:0',
                        'amount.' . $data => 'required|gte:5'],
                    ['amount.' . $data . '.required' => 'Blm Diisi',
                        'amount.' . $data . '.gte' => 'Min bet 5'
                    ]
                );
        $user_id = Auth::user()->id;
        $totalamount = array_sum($this->amount);
        $totaldiskon = $totalamount * ($this->diskon /100);
        $total = $totalamount - $totaldiskon;
        $result = Result::find($this->pasaran);
        $kredit = Auth::user()->profile->kredit;

        if($result->status == 1){
            if($kredit >= array_sum($this->amount)){
                DB::beginTransaction();
                $invoice = new Invoices;
                $invoice->user_id = $user_id;
                $invoice->result_id = $this->pasaran;
                $invoice->amount = $totalamount;
                $invoice->total = $total;
                $invoice->diskon = $totaldiskon;
                $invoice->winLose = 0;
                $invoice->status = 0;
                $invoice->tgl_invoice = now();
                $invoice->save();

                foreach($this->amount as $data => $value){
                    $datainsert[] = array(
                        'invoice_id' => $invoice->id,
                        'result_id' => $this->pasaran,
                        'user_id' => $user_id,
                        'kode' => 'CLJ',
                        'posisi' => $this->posisi[$data],
                        'data' => $data,
                        'amount' => $value,
                        'hadiah' => $this->hadiah,
                        'diskon' => $this->diskon,
                        'kei' => 0,
                        'winlose' => 0,
                        'total' => $value - ($value * ($this->diskon /100)),
                        'status' => 2,
                        'tgl_beli' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                    $kredituse = $kredituse + $value;
                }
                InvoiceDetail::insert($datainsert);
                Profile::where('user_id',$user_id)->update(['kredit' => $kredit - $kredituse]);
                DB::commit();
                session()->flash('success','Data Sudah Berhasil Disimpan');
                return redirect()->route('colokbebasview', $this->pasaran);
            }else{
                session()->flash('error','Maaf Kredit anda tidak cukup');
            }
        }else{
            session()->flash('error','Maaf Market Sudah Tutup');
        }

        }

    }
}
