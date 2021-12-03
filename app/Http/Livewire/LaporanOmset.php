<?php

namespace App\Http\Livewire;

use App\Models\InvoiceDetail;
use App\Models\Result;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Excel;

class LaporanOmset extends Component
{
    public $pasarans;
    public $kode;
    public $caridata;


    public function render()
    {
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

    public function export()
    {

    }
}

