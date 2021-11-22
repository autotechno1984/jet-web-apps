<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){
        $request->validate([
            'username'=>'required|exists:admins,username',
            'password'=> 'required|min:5|max:15',
        ],[
            'username.exists' => 'this username is not exist on data'
        ]);

        $creds = $request->only('username','password');

        if( Auth::guard('admin')->attempt($creds) ) {
            return redirect()->route('admin.home');
        }else {
            return redirect()->route('admin.login')->with('fail','Username dan password tidak ada');
        }
    }

    function home(){
        return view("backend.dashboard");
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    function websetting() {
        $dataContact = Contact::all();

        return view('backend.websitesetting',compact('dataContact'));
    }
}
