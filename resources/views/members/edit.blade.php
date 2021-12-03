@extends('layouts.admin-panel')
@section('users.edit')
<div style="margin-left:20px; margin-right:20px; margin-top:10px; overflow-y: auto;">
    <div class="row">
        {{--            User Login   --}}
        <div class="col-lg-4">

            <form action="{{ route('admin.users.update', [$id]) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="card">
                    <div class="card-header bg-warning font-weight-bold">
                        Edit User
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-6">
                                <label for="username" class="col-form-label">Username</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" value="{{ $dataUser->username }}" maxlength="12" readonly>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="nama" class="col-form-label">nama</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $dataUser->name }}" placeholder="Nama Lengkap" >
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="email" class="col-form-label">Email</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $dataUser->email }}" placeholder="Email@gmail.com" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="Akun" class="col-form-label"> Jenis Akun</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select" name ="group" aria-label="Default select example">

                                    <option value="{{$dataUser->status}}">{{ ($dataUser->status == 1) ? 'Member' : 'Agen' }}</option>
                                    <option value="1">Member</option>
                                    <option value="6">Agent</option>

                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card mt-1">
                    <div class="card-header bg-warning">
                        User Detail
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="handphone" class="col-form-label">Handphone</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="handphone" id="handphone" class="form-control @error('handphone') is-invalid @enderror" maxlength="13" value="{{$dataUser->profile->handphone ?? '-'}}" placeholder="Handphone">
                                @error('handphone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="alamat" class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-lg-6">
                                <textarea class="form-control" name="alamat" id="alamat" rows="2" placeholder="Alamat Lengkap 150 Karakter" maxlength="150">{{ $dataUser->profile->alamat ?? '-'}}</textarea>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="provinsi" class="col-form-label">Provinsi</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="provinsi" id="alamat" class="form-control @error('provinsi') is-invalid @enderror" placeholder="provinsi" value="{{ $dataUser->profile->provinsi ?? '-' }}">
                                @error('provinsi')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="kota" class="col-form-label">Kota</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="kota" id="kota" class="form-control @error('kota') is-invalid @enderror" placeholder="Kota" value="{{ $dataUser->profile->kota ?? '-' }}">
                            </div>
                            @error('kota')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="kodekota" class="col-form-label">Kode-Kota</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="kodekota" id="kodekota" class="form-control @error('kodekota') is-invalid @enderror" placeholder="Kota" value="{{ $dataUser->profile->kodekota ?? '-' }}">
                            </div>
                            @error('kodekota')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="kelurahan" class="col-form-label"> kelurahan</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="kelurahan atau desa" maxlength="100" value="{{ $dataUser->profile->kelurahan ?? '-' }}">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="kecamatan" class="col-form-label">Kecamatan</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="kecamatan" value="{{$dataUser->profile->kecamatan ?? '-'}}">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="rtrw" class="col-form-label">Rt / Rw</label>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="rtrw" id="rtrw" class="form-control" placeholder="RT / RW" value="{{ $dataUser->profile->rtrw ?? '-'}}">
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <button class="btn btn-warning form-control">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
{{--            RESET PASSWORD--}}
            <div class="card mt-1">
                <div class="card-header bg-danger text-white">
                    Change Password
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.resetpass' , [$id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="newpassword" id="newpassword" class="form-control" placeholder="New Password" maxlength="12">
                            </div>
                            <div class="col-lg-6">
                                <button class="form-control btn-danger text-white">Change Password</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--            User Bank --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white font-weight-bold">
                    Bank Information | Maximal 3 Bank
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.bankuser', [$id]) }}" method="post">
                        @csrf

                    <div class="row">
                        <div class="col-lg-6">
                                    <label for="bank" class="col-form-label">Bank</label>
                        </div>

                        <div class="col-lg-6">
                            <select name="bank" id="bank" class="form-select">
                                <option selected>Nama Bank</option>
                                    @foreach($bank as $data)
                                    <option value="{{ $data->nama  }}">{{ $data->nama }} </option>
                                    @endforeach
                             </select>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="namabank" class="col-form-label">Nama Rekening</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="namarekening" id="namarekening" placeholder="Nama rekening">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="norekening" class="col-form-label">No rekening</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="norekening" id="norekening" placeholder="No rekening">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <button class="form-control btn-primary text-white">Simpan Data</button>
                        </div>
                    </div>

                    </form>
                </div>

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">

                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

            </div>

{{--            GAMES LIMIT --}}
            <div class="card mt-1">
                <div class="card-header bg-primary text-white">
                    Games - Limit
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.userlimit', [$id]) }}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="games" class="col-form-label">
                                    Games
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <select name="games" id="games" class="form-select">
                                    <option selected>Pilih Game</option>
                                    @foreach($game as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="limit" class="col-form-label">Limit</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="limit" id="limit" class="form-control" placeholder="limit-by-games" maxlength="12">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">
                               <button class="btn btn-info form-control">Simpan Or Update</button>
                            </div>
                        </div>

                    </form>



                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <table class="table table-bordered text-center">
                                <thead style="background: #718096; color:white;">
                                <tr>
                                    <th>Games</th>
                                    <th>Limit</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($userlimit as $data)
                                        <tr>
                                            <td>{{ $data->games }}</td>
                                            <td>{{ number_format($data->limit) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

{{--        AKUN BANK USER--}}

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Bank Detail
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead style="background: #718096; color:white;">

                            <tr>
                                <th>Bank</th>
                                <th>No - Rekening</th>
                                <th>Nama - Rekening</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($userBankDetail as $userbank)
                                <tr>
                                    <td>{{$userbank->nama}}</td>
                                    <td>{{$userbank->nomor_bank}}</td>
                                    <td>{{$userbank->nama_bank}}</td>
                                    <form action="{{route('admin.hapusbankuser', [$id, $userbank->id] )}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <td>  <button type="submit" style=" box-shadow: none; border:1px solid white;"}}><i class="fa-solid fa-trash-can" style="color:red;"></i></button></td>
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Blm ada rekening</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header bg-warning">
                    Referall dan upline id
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.referall', [$id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="referrallid" class="col-form-label">
                                Referall ID
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="referallid" id="referallid" placeholder="Referall-id" value="{{ $dataUser->referallid }}"readonly>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="uplineid" class="col-form-label">
                                Upline id
                            </label>
                        </div>
                        <div class="col-lg-6">
                            @if(empty($dataUser->uplineid))
                            <input type="text" class="form-control" name="uplineid" id="uplineid" placeholder="Upline - ID" >
                            @else
                                <input type="text" class="form-control" name="uplineid" id="uplineid" placeholder="Upline - ID" value="{{ $dataUser->uplineid }}" readonly>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="status" class="col-form-label">
                                Status
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <select name="status" id="status" class="form-select">
                            @if($dataUser->status == 0)
                                    <option value="0" selected class="text-danger" style="font-weight: bold;">Tidak Aktif</option>
                                    <option value="6"  class="text-primary " style="font-weight: bold"> Aktifkan Agent</option>
                                    <option value="1"  class="text-primary " style="font-weight: bold"> Aktifkan Member</option>
                            @else
                                    <option value="{{ $dataUser->status }}" selected class="text-primary " style="font-weight: bold">Aktif</option>
                                    <option value="0" class="text-danger" style="font-weight: bold;">Non Aktifkan</option>
                            @endif

                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="downline" class="col-form-label">Jumlah Downline</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="downline" id="downline" class=" form-control-plaintext" readonly value="{{ $downline }}">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">

                        </div>

                        <div class="col-lg-6">
                            <button class="form-control btn-danger">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
