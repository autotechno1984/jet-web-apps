<?php

namespace App\Http\Livewire;

use App\Models\InvoiceDetail;
use App\Models\Result;
use Livewire\Component;
use DB;

class Omsetdetail extends Component
{
    public $invdetail;
    public $periode;
    public $idresult;

    public function mount(){
        $this->invdetail = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->groupBy('result_id','kode','data')->limit(50)->get();

        $this->periode = Result::orderBy('id', 'Desc')->limit(50)->get();
    }


    public function render()
    {
        return view('livewire.omsetdetail');
    }

    public function search(){

        $this->invdetail = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->groupBy('result_id','kode','data')->limit(50)->get();

    }
}
