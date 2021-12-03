<?php

namespace App\Http\Controllers;

use App\Models\bank;
use App\Models\games;
use App\Models\userBankDetail;
use App\Models\UserLimit;
use Carbon\Carbon;
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
            return '<a  href="'. route('admin.users.show', $model->id) .'" style="color:yellow; background: dodgerblue;">Edit</a>';})->toJson();
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
        $user->status = $request->group;
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

        return redirect()->route('admin.user-list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataUser = User::with('profile')->findOrFail($id);
        $userBankDetail = userBankDetail::where('user_id',$id)->get();
        $bank = bank::all();
        $game = games::all();
        $userlimit = UserLimit::where('user_id',$id)->get();
        $downline = User::where('uplineid', $dataUser->referallid)->count();



        return view('members.edit', compact('id','dataUser','userBankDetail','bank','game','userlimit','downline'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // DD('EDIT', $id);
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
        $userData = User::with('profile')->findOrfail($id);
        $userData->name = $request->nama;
        $userData->email = $request->email;
        $userData->status = $request->group;
        $userData->profile->handphone = $request->handphone;
        $userData->profile->alamat = $request->alamat;
        $userData->profile->provinsi = $request->provinsi;
        $userData->profile->kota = $request->kota;
        $userData->profile->kodekota = $request->kodekota;
        $userData->profile->kelurahan = $request->kelurahan;
        $userData->profile->kecamatan = $request->kecamatan;
        $userData->profile->rtrw = $request->rtrw;

        $userData->save();
        $userData->profile->save();

        return redirect()->route('admin.users.show',[$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function resetpass(Request $request, $id){
        $gantipassword = User::findOrFail($id);
        $gantipassword->password = Hash::make($request->newpassword);
        $gantipassword->save();

        return redirect()->route('admin.users.show', [$id]);
    }

    public function akunbankuser($id, $bankid){
        $data = userBankDetail::find($bankid);
        $data->delete();

        return redirect()->route('admin.users.show', [$id]);

    }

    public function savebankuser(Request $request, $id){
        $checkbank = userBankDetail::where('user_id', $id)->count();
        if($checkbank >= 3){
            return redirect()->route('admin.users.show',[$id])->with('error', 'Rekening Bank Tidak boleh lebih dari 3');

        } else {
            $kategori = Bank::where('nama', $request->bank)->pluck('kategori')->first();

            $request->validate([
                'bank' => 'required',
                'namarekening' => 'required',
                'norekening' => 'required:min:10',
            ]);

            $userbank = new userBankDetail();
            $userbank->user_id = $id;
            $userbank->kategori = $kategori;
            $userbank->nama = $request->bank;
            $userbank->nama_bank = $request->namarekening;
            $userbank->nomor_bank = $request->norekening;
            $userbank->save();

            return redirect()->route('admin.users.show', [$id])->with('success','Data bank Berhasil ditambahkan');

        }


    }

    public function userlimit(Request $request, $id){

         $game = games::where('id', $request->games )->pluck('kode')->first();

        $userlimit = UserLimit::updateOrCreate(
                ['user_id' => $id, 'games' => $game ],
                ['limit' => $request->limit, 'tgl_ubah' => \Carbon\Carbon::now()->toDateTimeString()]
        );

        return redirect()->route('admin.users.show',[$id]);
    }

    public function referall(Request $request, $id){

        $updatereferall = User::where('id', $id)->update(['uplineid' => $request->uplineid, 'status' => $request->status]);
        return redirect()->route('admin.users.show', [$id]);

    }
}
