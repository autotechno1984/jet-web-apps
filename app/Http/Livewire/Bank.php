<?php

namespace App\Http\Livewire;

use App\Models\bankDetail;
use Livewire\Component;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class Bank extends Component
{
    public $kategori;
    public $kategoribank;
    public $listkategori;
    public $namabank;
    public $nomorrekening;
    public $namarekening;
    public function render()
    {
        $banks = DB::table('banks')->get();
        $bankdetail = bankDetail::all();
        return view('livewire.bank',compact('banks', 'bankdetail'));
    }

    public function kategori()
    {
        $bank = new \App\Models\bank;
        $bank->kategori = $this->kategori;
        $bank->nama = $this->kategoribank;
        $bank->save();

        $this->kategori = '';
        $this->kategoribank = '';
        return redirect()->back();
    }

    public function savebank()
    {

        $bank = \App\Models\bank::find($this->listkategori);
        $bankdetail = new bankDetail;
        $bankdetail->bank_id = $bank->id;
        $bankdetail->nama = $bank->nama;
        $bankdetail->nama_bank = $this->namarekening;
        $bankdetail->nomor_akun = $this->nomorrekening;
        $bankdetail->status = 1;
        $bankdetail->save();

        $this->listkategori = '';
        $this->namarekening ='';
        $this->nomorrekening = '';

        return redirect()->back();

    }
}
