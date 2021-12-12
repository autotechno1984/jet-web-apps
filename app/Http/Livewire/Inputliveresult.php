<?php

namespace App\Http\Livewire;

use App\Models\Result;
use App\Models\liveresult;
use Livewire\Component;

class Inputliveresult extends Component
{
    public $pasaran;
    public $data;
    public $status;
    public $updatehasil;
    public $kode;
    public $dataresult;
    public function render()
    {
        $this->dataresult = liveresult::all();
        $result = Result::where('tipe','H')->wherein('status',['1','2'])->get();
        return view('livewire.inputliveresult',compact('result'));
    }

    public function liveresult()
    {
        $this->data = Result::find($this->pasaran);
        $check = liveresult::all();
        if($check != null){
            \App\Models\liveresult::truncate();
            $inputdata = new \App\Models\liveresult;
            $inputdata->tanggal = $this->data->tgl_periode;
            $inputdata->periode = $this->data->id;
            $inputdata->pasaran = $this->data->pasaran;
            $inputdata->sh1 = '';
            $inputdata->sh2 = '';
            $inputdata->sh3 = '';
            $inputdata->sh4 = '';
            $inputdata->sh5 = '';
            $inputdata->sh6 = '';
            $inputdata->sh7 = '';
            $inputdata->sh8 = '';
            $inputdata->sh9 = '';
            $inputdata->sh10 = '';
            $inputdata->sh11 = '';
            $inputdata->sh12 = '';
            $inputdata->sh13 = '';
            $inputdata->sh14 = '';
            $inputdata->sh15 = '';
            $inputdata->status = 'LIVE';
            $inputdata->save();

            $this->status = 'LIVE...';

        }
    }

    public function updateresult()
    {
        $updateinput = liveresult::where('periode', $this->pasaran)->update([ $this->kode => $this->updatehasil ]);
        $this->dataresult = liveresult::all();
        $this->kode = '';
        $this->updatehasil = '';
        return redirect()->back();
    }
}
