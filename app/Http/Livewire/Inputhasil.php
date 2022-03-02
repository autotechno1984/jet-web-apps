<?php

namespace App\Http\Livewire;

use App\Models\Result;
use App\Models\tabelhasil;
use Livewire\Component;

class Inputhasil extends Component
{
    public $resultid;
    public $hadiahsatu;
    public $hadiahdua;
    public $hadiahtiga;
    public $startersatu;
    public $starterdua;
    public $startertiga;
    public $consol1;
    public $consol2;
    public $consol3;
    public $consol4;
    public $consol5;
    public $consol6;
    public $consol7;
    public $consol8;
    public $consol9;




    public function mount(){

    }

    public function render()
    {   $hasil = Result::where('status', 2)->get();
        $tablehasil = Result::with('tabelhasil')->orderBy('id','desc')->paginate(20);
        return view('livewire.inputhasil',compact('hasil', 'tablehasil'));
    }

    public function savehasil() {
        $data = array(
            array('result_id' => $this->resultid, 'kode' => 'sh1' , 'hasil' => $this->hadiahsatu),
            array('result_id' => $this->resultid, 'kode' => 'sh2' , 'hasil' => $this->hadiahdua),
            array('result_id' => $this->resultid, 'kode' => 'sh3' , 'hasil' => $this->hadiahtiga),
            array('result_id' => $this->resultid, 'kode' => 'sh4' , 'hasil' => $this->startersatu),
            array('result_id' => $this->resultid, 'kode' => 'sh5' , 'hasil' => $this->starterdua),
            array('result_id' => $this->resultid, 'kode' => 'sh6' , 'hasil' => $this->startertiga),
            array('result_id' => $this->resultid, 'kode' => 'sh7' , 'hasil' => $this->consol1),
            array('result_id' => $this->resultid, 'kode' => 'sh8' , 'hasil' => $this->consol2),
            array('result_id' => $this->resultid, 'kode' => 'sh9' , 'hasil' => $this->consol3),
            array('result_id' => $this->resultid, 'kode' => 'sh10' , 'hasil' => $this->consol4),
            array('result_id' => $this->resultid, 'kode' => 'sh11' , 'hasil' => $this->consol5),
            array('result_id' => $this->resultid, 'kode' => 'sh12' , 'hasil' => $this->consol6),
            array('result_id' => $this->resultid, 'kode' => 'sh13' , 'hasil' => $this->consol7),
            array('result_id' => $this->resultid, 'kode' => 'sh14' , 'hasil' => $this->consol8),
            array('result_id' => $this->resultid, 'kode' => 'sh15' , 'hasil' => $this->consol9),
        );

        $validated = $this->validate([
           'resultid' => 'required',
        ]);

         tabelhasil::insert($data);
         Result::where('id', $this->resultid)
                ->update([
             'status' => 3
         ]);
         $this->resultid = '';
         $this->hadiahsatu = '';
         $this->hadiahdua = '';
         $this->hadiahtiga = '';
         $this->startersatu = '';
         $this->starterdua = '';
         $this->startertiga = '';
         $this->consol1 = '';
         $this->consol2 = '';
         $this->consol3 = '';
         $this->consol4 = '';
         $this->consol5 = '';
         $this->consol6 = '';
         $this->consol7 = '';
         $this->consol8 = '';
         $this->consol9 = '';
        return redirect()->back();

    }
}
