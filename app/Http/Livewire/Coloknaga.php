<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Invoices;
use App\Models\Profile;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Auth;
use function PHPUnit\Framework\isEmpty;

class Coloknaga extends Component
{
    public $nomor = array();
    public $amount = array();
    public $pasaran;
    public $diskon;
    public $hadiah;

    public function mount($id){
        $this->pasaran = $id;
        $games = games::select('hadiah', 'diskon')->where('kode', 'CLN')->get();
        $this->hadiah = $games->pluck('hadiah')->first();
        $this->diskon = $games->pluck('diskon')->first();

    }
    public function render()
    {
        return view('livewire.coloknaga');
    }

    public function createinvoice(){

        $res = array_filter($this->nomor, function($value) {
            return ($value != '' && strlen($value) >2 && $value != 0);
        });

        $kredituse = 0;

        if(Empty($res)){

        }else{
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

                    foreach($res as $data => $value){
                        $validateamount = $this->validate([
                            'amount.'.$data =>'required|gte:10',
                        ],
                            ['amount.'.$data.'.required' => 'Min bet 10',
                                'amount.'.$data.'.gte' => 'Min bet 10']
                        );
                        $datainsert[] = array(
                            'invoice_id' => $invoice->id,
                            'result_id' => $this->pasaran,
                            'user_id' => $user_id,
                            'kode' => 'CLN',
                            'posisi' => 0,
                            'data' => $value,
                            'amount' => $this->amount[$data],
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
                        $kredituse = $kredituse + $this->amount[$data];
                    }
                    InvoiceDetail::insert($datainsert);
                    Profile::where('user_id',$user_id)->update(['kredit' => $kredit - $kredituse]);
                    DB::commit();

                    session()->flash('success','Data Sudah Berhasil Disimpan');
                    return redirect()->route('view.coloknaga', $this->pasaran);
                }else{
                    session()->flash('error','Maaf Kredit anda tidak cukup');
                }
            }else{
                session()->flash('error','Maaf Market Sudah Tutup');
            }
        }



    }

}
