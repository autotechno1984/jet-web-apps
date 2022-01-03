<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Auth;

class Colokmacau extends Component
{
    public $pasaran;
    public $nomor = array();
    public $amount = array();
    public $hadiahclm;
    public $diskonclm;
    public function mount($id){
        $games = games::where('kode','clm')->first();
        $this->hadiahclm = $games->hadiah;
        $this->diskonclm = $games->diskon;
        $this->pasaran = $id;
    }

    public function render()
    {
        return view('livewire.colokmacau');
    }

    public function updatednomor($value, $key){
        if(strlen($value) == 1){
            if(isset($this->amount[$key]))
            $this->amount[$key] = '';
        }elseif(strlen($value) == 2) {

        }else{

        }
    }

    public function createinvoice(){
        foreach($this->nomor as $data => $value){
               if(strlen($value) == 2){
                    $validatedata = $this->validate(
                        ['amount.'.$data =>'required|gte:10'],
                        ['amount.'.$data.'.required' => 'Min Bet 10',
                            'amount.'.$data.'.gte' => 'Min Bet 10'],
                    );
               }elseif(strlen($value) == 1){
                   $this->nomor[$data] = '';
               }
            }
        $user_id = Auth::user()->id;
        $totalamount = array_sum($this->amount);
        $totaldiskon = $totalamount * ($this->diskonclm /100);
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
                        'kode' => 'CLM',
                        'posisi' => 0,
                        'data' => $this->nomor[$data],
                        'amount' => $value,
                        'hadiah' => $this->hadiahclm,
                        'diskon' => $this->diskonclm,
                        'kei' => 0,
                        'winlose' => 0,
                        'total' => $value - ($value * ($this->diskonclm /100)),
                        'status' => 2,
                        'tgl_beli' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                }

                InvoiceDetail::insert($datainsert);
                DB::commit();
                session()->flash('success','Data Sudah Berhasil Disimpan');
                return redirect()->route('colokmacauview', $this->pasaran);
            }else{
                session()->flash('error','Maaf Kredit anda tidak cukup');
            }
        }else{
            session()->flash('error','Maaf Market Sudah Tutup');
        }

    }

}
