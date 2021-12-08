<?php

namespace App\Http\Livewire;

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
        if($this->kode == ''){
            return (new OmsetDaily($this->pasarans))->download('OmsetByPasaran.xlsx');
        }elseif($this->caridata == ''){
            return Excel::download(OmsetDaily::where('status',2)->where('result_id', $this->pasaran)->where('kode', $this->kode)->get(), 'omsetbykode.xlsx');
        }else {
            return Excel::download(OmsetDaily::where('status', 2)->where('result_id', $this->pasaran)->where('kode', $this->kode)->where('data', $this->caridata)->get(), 'Omsetbykodenddata.xlsx');
        }

    }
}

