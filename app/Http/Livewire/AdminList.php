<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\WhiteListIp;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AdminList extends Component
{
    public $nama;
    public $username;
    public $password;
    public $handphone;
    public $usernamecheck;
    public $passwordbaru;
    public $messageusernotexist;
    public $namaip;
    public $ipaddress;



    public function render()
    {
        $admin = Admin::all();
        $whiteip = WhiteListIp::all();
        return view('livewire.admin-list',compact('admin', 'whiteip'));
    }

    public function addadmin(){

        $validatedData = $this->validate([
            'nama' => 'required|min:3',
            'username' => 'required',
            'password' => 'required|min:8',
            'handphone' => 'required|min:10',
        ]);

        $admin = new Admin;
        $admin->nama = $this->nama;
        $admin->username = $this->username;
        $admin->password = Hash::make($this->password);
        $admin->handphone = $this->handphone;
        $admin->role = 1;
        $admin->save();


        $this->nama = '';
        $this->username = '';
        $this->password = '';
        $this->handphone = '';
        return redirect()->back();

    }

    public function deladmin($id) {
        $admin = Admin::find($id);
        $admin->bann = 0;
        $admin->save();
        return redirect()->back();
    }

    public function gantipassword(){

//        $validateData = $this->validate([
//           'passwordbaru' => 'required|min:8;'
//        ]);

        $admin = Admin::where('username', $this->usernamecheck)->first();

        if($admin == null){
            $this->messageusernotexist = 'Username Tidak ada';
        } else {
            $this->messageusernotexist = 'change password';
            $admin->password = Hash::make($this->passwordbaru);
            $admin->save();
            $this->usernamecheck = '';
            $this->passwordbaru = '';
            return redirect()->back();
        }

    }

    public function updatestatus($id){

          $admin = Admin::find($id);
          if($admin->bann == 0){

              $admin->bann = 1;
              $admin->save();
              return redirect()->back();

          } else {

              $admin->bann = 0;
              $admin->save();
              return redirect()->back();

          }

    }

    public function whitleslistip(){

            $validate = $this->validate([
               'namaip' => 'required|min:3',
               'ipaddress' => 'required|min:8',
            ]);

            $whitelistip = new WhiteListIp;
            $whitelistip->nama = $this->namaip;
            $whitelistip->whiteip = $this->ipaddress;
            $whitelistip->save();

            $this->namaip = '';
            $this->ipaddress = '';
            return redirect()->back();

    }

    public function deleteip($id){

        $whiteip = WhiteListIp::find($id);
        $whiteip->delete();
        return redirect()->back();

    }


}
