<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Auth;

class Colokbebas extends Component
{
    public $hadiahclb;
    public $diskonclb;
    public $pasaran;
    public $amount = array();
    public $total;
    public function mount($id){
        $games = games::where('kode','clb')->first();
        $this->hadiahclb = $games->hadiah;
        $this->diskonclb = $games->diskon;
        $this->pasaran = $id;

    }

    public function render()
    {
        return view('livewire.colokbebas');
    }

    public function total(){
            $validateMin = $this->validate(
                ['amount.*' => 'gte:10'],
                ['amount.*.gte' => 'min bet 10',]
            );

        $user_id = Auth::user()->id;
        $totalamount = array_sum($this->amount);
        $totaldiskon = $totalamount * ($this->diskonclb /100);
        $total = $totalamount - $totaldiskon;
        $result = Result::find($this->pasaran);
        $kredit = Auth::user()->profile->kredit;

        if($result->status == 1){
            if($kredit >= array_sum($this->amount)){
                DB::beginTransaction();
                $invoice = new Invoices;
                $invoice->user_id = $user_id;
                $invoice->result_id = $this->pasaran;
                $invoice->amount = array_sum($this->amount);
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
                        'kode' => 'CLB',
                        'posisi' => 0,
                        'data' => $data,
                        'amount' => $value,
                        'hadiah' => $this->hadiahclb,
                        'diskon' => $this->diskonclb,
                        'kei' => 0,
                        'winlose' => 0,
                        'total' => $value - ($value * ($this->diskonclb /100)),
                        'status' => 2,
                        'tgl_beli' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                }

                InvoiceDetail::insert($datainsert);
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
