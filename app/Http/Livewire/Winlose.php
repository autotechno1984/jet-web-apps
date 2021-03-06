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
    public $periode;

    public function mount()
    {

        $hariini = date('Y-m-d', strtotime(now()));
        $this->search = $hariini;
        $this->datas = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'), \DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'),\DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$this->search)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::where(\DB::raw('DATE_FORMAT(tgl_periode, "%Y-%m-%d")'),$this->search)->get();

    }

    public function render()
    {
        return view('livewire.winlose');
    }

    public function today(){
        $hariini = date('Y-m-d', strtotime(now()));
        $this->search = $hariini;
        $this->datas = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'), \DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'), \DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$this->search)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::where(\DB::raw('DATE_FORMAT(tgl_periode, "%Y-%m-%d")'),$this->search)->get();
    }

    public function wlsubagen(){

        if($this->periode == null){
            session()->flash('error', 'Silahkan Dipilih periode');
            return redirect()->to('admin-panel/winlose-agen');
        }
        else {

            redirect()->route('admin.exportlaporanwlsubagen', [$this->search, $this->periode] );

        }
    }

    public function caridata()
    {
        $cari = date('Y-m-d', strtotime($this->search));
        $this->datas = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'),\DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'), \DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$cari)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::where(\DB::raw('DATE_FORMAT(tgl_periode, "%Y-%m-%d")'),$cari)->get();
    }

    public function semalam()
    {

        $semalam = date('Y-m-d', strtotime(now()->subDays(1)));
        $this->search = $semalam;
        $this->datas = Invoices::select('result_id',\DB::raw('count(DISTINCT(result_id)) as member'),\DB::raw('sum(amount) as omset'),\DB::raw('(sum(amount) - sum(total)) as diskon'), \DB::raw('sum(winLose) as winlose'), \DB::raw('date_format(tgl_invoice,"%Y-%m-%d") as tanggal'))
            ->where(\DB::raw('DATE_FORMAT(tgl_invoice, "%Y-%m-%d")'),$semalam)
            ->groupBy('result_id','tanggal')->get();
        $this->pasaran = Result::where(\DB::raw('DATE_FORMAT(tgl_periode, "%Y-%m-%d")'),$this->search)->get();

    }
}
