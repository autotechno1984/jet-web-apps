<?php

namespace App\Http\Livewire;

use App\Models\InvoiceDetail;
use App\Models\Result;
use Livewire\Component;
use DB;

class Omsetdetail extends Component
{
    public $empatd;
    public $tigad;
    public $duad;
    public $periode;
    public $idresult;

    public function mount(){
        $this->empatd = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->where('kode','4D')->groupBy('result_id','kode','data')->orderBy('id','Desc')->limit(50)->get();
        $this->tigad = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->where('kode','3D')->groupBy('result_id','kode','data')->orderBy('id','Desc')->limit(50)->get();
        $this->duad = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->where('kode','2D')->groupBy('result_id','kode','data')->orderBy('id','Desc')->limit(50)->get();

        $this->periode = Result::orderBy('id', 'Desc')->limit(50)->get();
    }


    public function render()
    {
        return view('livewire.omsetdetail');
    }

    public function search(){

        $this->empatd = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->where('kode','4D')->groupBy('result_id','kode','data')->orderBy('id','Desc')->limit(50)->get();
        $this->tigad = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->where('kode','3D')->groupBy('result_id','kode','data')->orderBy('id','Desc')->limit(50)->get();
        $this->duad = InvoiceDetail::select('result_id', 'kode', 'data', DB::raw('sum(amount) as total'))->where('result_id',$this->idresult)->where('kode','2D')->groupBy('result_id','kode','data')->orderBy('id','Desc')->limit(50)->get();

    }
}
