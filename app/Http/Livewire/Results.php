<?php

namespace App\Http\Livewire;

use App\Models\Market;
use App\Models\Result;
use Livewire\Component;
use Livewire\WithPagination;
use function PHPUnit\Framework\isEmpty;

class Results extends Component
{
    use WithPagination;
//    public $results;
    public $markets;
    public $pasaran;
    public $kodepasaran;
    public $periode;
    public $noperiode;
    public $nourut;

    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        // $this->results = Result::all();
        $this->markets = Market::all();
    }


    public function render()
    {

        return view('livewire.results',[
            'resulttable' => Result::with('result_details')->orderBy('id','desc')->paginate(10),
        ]);

    }

    public function submit()
    {
        $this->noperiode = Result::where('market_id', $this->pasaran)->orderBy('id','desc')->first();
        $this->kodepasaran = Market::findOrfail($this->pasaran);


        if(isset($this->noperiode->periode)){
            $this->nourut = $this->noperiode->periode + 1;
           if($this->noperiode->status == 1){
                session()->flash('error','Pasaran Sedang Berjalan');
               $this->emit('alert_remove');
               return;
           }
           else {

               $inputResult = new Result;

               $inputResult->market_id = $this->pasaran;
               $inputResult->periode = $this->nourut;
               $inputResult->kode = $this->kodepasaran->kode;
               $inputResult->pasaran = $this->kodepasaran->nama;
               $inputResult->tipe = $this->kodepasaran->tipe;
               $inputResult->jambuka = $this->kodepasaran->jambuka;
               $inputResult->jam_tutup = $this->kodepasaran->jamtutup;
               $inputResult->save();

           session()->flash('success','Pasaran Sudah dibuka !!');
               $this->emit('alert_remove');
               return;
           }
        } else {
            $this->nourut = 1000;
            $inputResult = new Result;

            $inputResult->market_id = $this->pasaran;
            $inputResult->periode = $this->nourut;
            $inputResult->kode = $this->kodepasaran->kode;
            $inputResult->pasaran = $this->kodepasaran->nama;
            $inputResult->tipe = $this->kodepasaran->tipe;
            $inputResult->jambuka = $this->kodepasaran->jambuka;
            $inputResult->jam_tutup = $this->kodepasaran->jamtutup;
            $inputResult->save();

            session()->flash('success','Pasaran Sudah dibuka !!');
            $this->emit('alert_remove');
            return;
        }
    }


    public function tutup($id){
        $updatestatus = Result::where('id', $id)->update(['status' => 2]);
        return redirect()->back();
    }

}
