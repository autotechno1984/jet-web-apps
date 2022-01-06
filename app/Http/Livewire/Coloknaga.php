<?php

namespace App\Http\Livewire;

use App\Models\games;
use Livewire\Component;

class Coloknaga extends Component
{
    public $nomor = array();
    public $amount = array();
    public $pasaran;
    public $diskon;
    public $hadiah;

    public function mount($id){
        $this->pasaran = $id;
        $games = games::select('hadiah', 'diskon')->where('kode', 'CLN')->get();
        $this->hadiah = $games->pluck('hadiah')->first();
        $this->diskon = $games->pluck('diskon')->first();

    }
    public function render()
    {
        return view('livewire.coloknaga');
    }

    public function createinvoice(){
        $res = array_filter($this->nomor, function($value) {
            return ($value != '');
        });

       foreach($res as $data => $value){
            if(strlen($value) >2){
                $validateData = $this->validate(
                    ['amount.'.$data =>'required|gte:5'],
                    ['amount.'.$data.'.required' => 'Min bet 1',
                      'amount.'.$data.'.gte' => 'Min Bet 5'    ]
                );
            }elseif(strlen($value) == 2 || strlen($value) == 1) {

            }
       }

    }
}
