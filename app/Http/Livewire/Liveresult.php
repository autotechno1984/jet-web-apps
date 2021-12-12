<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Liveresult extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        $liveresult = \App\Models\liveresult::all();

        return view('livewire.liveresult',compact('liveresult'));
    }
}
