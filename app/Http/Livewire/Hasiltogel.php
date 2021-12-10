<?php

namespace App\Http\Livewire;

use App\Models\Result;
use App\Models\tabelhasil;
use Livewire\Component;

class Hasiltogel extends Component
{
    public $resultid;
    public $nomor;
    public $search;

    public function mount()
    {

    }

    public function render()
    {
        $result = Result::where('tipe', 'D')->where('status',1)->get();
        $pasaran = Result::where('tipe','D')->get();
        $togel = Result::with('tabelhasil')->where('tipe','D')->paginate(12);
        return view('livewire.hasiltogel',compact('result','togel','pasaran'));
    }

    public function updatehasil()
    {
        $inputtogel = new tabelhasil;
        $updateresult = Result::find($this->resultid);
        $inputtogel->result_id = $this->resultid;
        $inputtogel->kode = '4D';
        $inputtogel->hasil = $this->nomor;
        $inputtogel->tgl_buka = now();
        $inputtogel->save();
        $updateresult->status = 0;
        $updateresult->save();


        $this->resultid = '';
        $this->nomor = '';

        return redirect()->back();
    }

    public function caridata(){
        $togel = Result::with('tabelhasil')->where('tipe','D')->where('pasaran',$this->search)->paginate(12);
    }
}
