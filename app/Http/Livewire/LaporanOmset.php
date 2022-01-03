<?php

namespace App\Http\Livewire;

use App\Models\games;
use App\Models\InvoiceDetail;
use App\Models\Result;
use App\Models\User;
use Livewire\Component;
use App\Exports\OmsetDaily;
use Maatwebsite\Excel\Facades\Excel;

class LaporanOmset extends Component
{
    public $pasarans;
    public $kode;
    public $caridata;
    public $user_id;
    public $datapass;
    public function mount(){
        $this->user_id = $this->pasarans;
    }

    public function render()
    {
        $this->datapass = Result::find($this->pasarans);
        $username = User::all();
        if($this->kode == ''){
            $omset = InvoiceDetail::where('status',2)->where('result_id',$this->pasarans)->paginate(15);
        }elseif($this->caridata == '') {
            $omset = InvoiceDetail::where('status',2)->where('result_id',$this->pasarans)->where('kode',$this->kode)->paginate(15);
        }else {
            $omset = InvoiceDetail::where('status',2)->where('result_id',$this->pasarans)->where('kode',$this->kode)->where('data',$this->caridata)->paginate(15);
        }

        $pasaran = Result::where('status',1)->get();
        return view('livewire.laporan-omset',compact('omset','username','pasaran'));
    }


    public function generatepdf(){

                    if($this->pasarans != null && $this->pasarans != 0) {
                        return redirect()->route('admin.exportlaporanomset', $this->pasarans);
            }
    }
}

