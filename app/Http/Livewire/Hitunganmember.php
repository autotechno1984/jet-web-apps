<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\transaksidepowd;
use App\Models\User;
use Livewire\Component;

class Hitunganmember extends Component
{
    public $transaksidepowd;
    public $userkredit;
    public $profile;
    public function mount(){
        $transaksi = transaksidepowd::select('user_id',\DB::raw('sum(amount) as total'))->groupBy('user_id')->get();
        $this->profile = User::with('profile')->get();
        $this->transaksidepowd = $transaksi;
    }

    public function render()
    {
        return view('livewire.hitunganmember');
    }

    public function bayar($value){
        dd($value);
    }
}
