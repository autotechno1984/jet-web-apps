<?php

namespace App\Http\Livewire;

use App\Models\transaksidepowd;
use App\Models\User;
use Livewire\Component;
use Auth;
class TambahKredit extends Component
{

    public $username;
    public $searchname;
    public $searchkredit;
    public $userid;
    public $kredit;
    public $disabled = 'disabled';

    public function mount(){

    }

    public function render()
    {
        return view('livewire.tambah-kredit');
    }

    public function search()
    {
        if($this->username == null){

        } else {
            $datauser = User::with('profile')->where('username', $this->username)->first();
            if($datauser){
                $this->searchname = $datauser->name;
                $this->searchkredit= $datauser->profile->kredit;
                $this->userid = $datauser->id;
                $this->disabled = '';
            } else {
                $this->searchname = '';
                $this->searchkredit = 0;
                $this->userid = '';
                $this->disabled = 'disabled';
                session()->flash('message', 'Username Tidak valid');
            }
        }

    }

    public function addkredit(){
     if($this->userid == ''){

     }else {
        $adminid =  Auth::guard('admin')->user()->id;

        $datakredit = User::with('profile')->find($this->userid);

        if( ($this->kredit*-1) > $datakredit->profile->kredit){
            session()->flash('krtdkcukup','Kredit Tidak Cukup Untuk Penarikan');
        } else {
            if($this->kredit < 0){
                $total = (float) $datakredit->profile->kredit + (float) $this->kredit;
                $addtransaksi = transaksidepowd::create([
                    'user_id' => $this->userid,
                    'kategori' => 'CRD',
                    'id_bank_detail' => 0,
                    'amount' => $this->kredit,
                    'bank' => 'debet',
                    'akun_bank' => 'debet',
                    'nama_bank' => 'debet',
                    'user_bank_detail' => '0',
                    'user_bank' => 'debet',
                    'user_nomor_bank' => 'debet',
                    'nama_akun_bank' => 'debet',
                    'status' => 1,
                    'catatan' => 'Tarik debet',
                    'approvedby' => $adminid,
                    'date_approved' => now(),
                    'data_request' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $datakredit->profile->kredit = $total;
                $datakredit->profile->save();
                $this->searchname = '';
                $this->searchkredit = 0;
                $this->userid = '';
                $this->kredit = '';
                $this->disabled = 'disabled';
                return redirect()->route('admin.admintransaksi');
            }else{
                $total = (float) $datakredit->profile->kredit + (float) $this->kredit;
                $addtransaksi = transaksidepowd::create([
                    'user_id' => $this->userid,
                    'kategori' => 'CRK',
                    'id_bank_detail' => 0,
                    'amount' => $this->kredit,
                    'bank' => 'kredit',
                    'akun_bank' => 'kredit',
                    'nama_bank' => 'kredit',
                    'user_bank_detail' => '0',
                    'user_bank' => 'kredit',
                    'user_nomor_bank' => 'kredit',
                    'nama_akun_bank' => 'kredit',
                    'status' => 1,
                    'catatan' => 'tambah kredit',
                    'approvedby' => $adminid,
                    'date_approved' => now(),
                    'data_request' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $datakredit->profile->kredit = $total;
                $datakredit->profile->save();
                $this->searchname = '';
                $this->searchkredit = 0;
                $this->userid = '';
                $this->kredit = '';
                $this->disabled = 'disabled';
                return redirect()->route('admin.admintransaksi');

            }

        }

     }
    }


}
