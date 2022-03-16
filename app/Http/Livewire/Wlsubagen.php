<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Wlsubagen extends Component
{
    public $date ;

    public function mount(){
        $this->date = 'dd-mm-yyyy';
    }


    public function render()
    {
        return view('livewire.wlsubagen');
    }
}
