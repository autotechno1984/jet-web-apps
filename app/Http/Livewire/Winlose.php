<?php

namespace App\Http\Livewire;

use App\Models\Invoices;
use App\Models\Result;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class Winlose extends Component
{
    public $data;
    public $search;
    public $pasaran;

    public function mount()
    {
        $hariini = date('Y-m-d', strtotime(now()));
        $this->search = $hariini;
        $this->data = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'), \DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'),\DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$hariini)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::all();
    }

    public function render()
    {
        return view('livewire.winlose');
    }

    public function today(){
        $hariini = date('Y-m-d', strtotime(now()));
        $this->search = $hariini;
        $this->data = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'), \DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'), \DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$hariini)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::all();
    }

    public function wlsubagen(){

        if($this->search == null){

        }
        else {
            redirect()->route('admin.exportlaporanwlsubagen', $this->search);
        }
    }

    public function caridata()
    {
        $cari = date('Y-m-d', strtotime($this->search));
        $this->data = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'),\DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'), \DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$cari)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::all();
    }

    public function semalam()
    {

        $semalam = date('Y-m-d', strtotime(now()->subDays(1)));
        $this->search = $semalam;
        $this->data = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'),\DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'), \DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$semalam)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::all();

    }
}
