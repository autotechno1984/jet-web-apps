<?php

namespace App\Http\Livewire;

use App\Models\InvoiceDetail;
use App\Models\Result;
use Livewire\Component;

class Omset extends Component
{

    public $dataid;

    public function render()
    {
        $empatangka = \DB::table('invoice_details')->select('kode','posisi','data',\DB::raw('sum(amount) as total'))->where('result_id', $this->dataid)->groupBy('kode','posisi','data')->orderBy('total','Desc')->paginate(15);
        $invdetailkode = \DB::table('invoice_details')->select('kode',\DB::raw('sum(amount) as total'))->where('result_id', $this->dataid)->groupBy('kode')->get();
        $pasaran = Result::where('status',1)->get();
        return view('livewire.omset', compact('pasaran', 'invdetailkode','empatangka'));

    }

    public function search()
    {


    }
}
