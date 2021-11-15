<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function members()
    {

        return view('members.index');
    }

    public function data() {

        return Datatables(User::with('profile')->get())->addColumn('action', function($model) {
            return '<a  href="'. route('users.show', $model->id) .'" style="color:yellow; background: dodgerblue;">Edit</a>';})->toJson();
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('members.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validate
        $validated = $request->validate([
            'nama' => 'required|max:40',
            'username' => 'required|unique:users|max:12',
            'email' => 'required:unique:users',
            'password' => 'required|min:8',
            'group' => 'required',
            'handphone' => 'required|min:10'
        ]);



        $user = new User;
        $profile = new Profile;

        $user->name = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->group;
        $user->referallid = Str::random(8);
        $user->save();

        $profile->user_id = $user->id;
        $profile->handphone = $request->handphone;
        $profile->alamat = $request->alamat;
        $profile->provinsi = $request->provinsi;
        $profile->kota = $request->kota;
        $profile->kodekota = $request->kodekota;
        $profile->kelurahan = $request->kelurahan;
        $profile->kecamatan = $request->kecamatan;
        $profile->rtrw = $request->rtrw;
        $profile->save();

        return redirect()->route('members');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('members.edit', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        DD('EDIT', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
