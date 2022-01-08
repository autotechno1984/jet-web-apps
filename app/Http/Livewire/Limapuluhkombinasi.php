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

class Limapuluhkombinasi extends Component
{
    public $data = array();
    public $amount = array();
    public $pasaran;
    public $hadiah;
    public $diskon;


    public function mount($id){
        $this->pasaran = $id;
        $games = games::where('kode','50UM')->first();
        $this->hadiah = $games->hadiah;
        $this->diskon = $games->diskon;
        $this->data = [
            '1' => 'BELAKANG-STEREO',
            '2' => 'BELAKANG-MONO',
            '3' => 'BELAKANG-KEMBANG',
            '4' => 'BELAKANG-KEMPIS',
            '5' => 'TENGAH-STEREO',
            '6' => 'TENGAH-MONO',
            '7' => 'TENGAH-KEMBANG',
            '8' => 'TENGAH-KEMPIS',
            '9' => 'DEPAN-STEREO',
            '10' => 'DEPAN-MONO',
            '11' => 'DEPAN-KEMBANG',
            '12' => 'DEPAN-KEMPIS',

        ];
    }

    public function render()
    {
        return view('livewire.limapuluhkombinasi');
    }

    public function createinvoice(){
        $res = array_filter($this->amount, function($value) {
            return ($value != '' && $value != 0);
        });
        $kredituse = 0;
        if(Empty($res)){

        }else{
            $validateMin = $this->validate(
                ['amount.*' => 'gte:10'],
                ['amount.*.gte' => 'min bet 10',]
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
                            'kode' => '50KB',
                            'posisi' => 0,
                            'data' => $this->data[$data],
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
                    return redirect()->route('view.limapuluhkombinasi', $this->pasaran);
                }else{
                    session()->flash('error','Maaf Kredit anda tidak cukup');
                }
            }else{
                session()->flash('error','Maaf Market Sudah Tutup');
            }
        }



    }
}
