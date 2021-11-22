@extends('layouts.admin-panel')
@section('users')
    <div style="margin-left:20px; margin-right:20px; margin-top:10px;">
        <div class="row">
{{--            User Login   --}}
            <div class="col-lg-4">
                <form action="{{ route('admin.users.store') }}" method="POST">
               @csrf
                <div class="card">
                    <div class="card-header">
                        Create User
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="username" class="col-form-label">Username</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" maxlength="12">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="username" class="col-form-label">Password</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password" maxlength="12">
                                @error('password')
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
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Lengkap" >
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
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email@gmail.com" >
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
                                    <option selected>Jenis Akun</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Manager</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Operator</option>
                                    <option value="4">Kasir</option>
                                    <option value="5">Agent</option>
                                    <option value="6">Member</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mt-1">
                    <div class="card-header">
                        User Detail
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="handphone" class="col-form-label">Handphone</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="handphone" id="handphone" class="form-control @error('handphone') is-invalid @enderror" maxlength="13" placeholder="Handphone">
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
                                <textarea class="form-control" name="alamat" id="alamat" rows="2" placeholder="Alamat Lengkap 150 Karakter" maxlength="150"></textarea>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="provinsi" class="col-form-label">Provinsi</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="provinsi" id="alamat" class="form-control @error('provinsi') is-invalid @enderror" placeholder="provinsi">
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
                                <input type="text" name="kota" id="kota" class="form-control @error('kota') is-invalid @enderror" placeholder="Kota">
                            </div>
                            @error('kota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="kodekota" class="col-form-label">Kode Kota</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="kodekota" id="kodekota" class="form-control" placeholder="Kode kota 4 Digit" maxlength="4">
                                @error('kodekota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="kelurahan" class="col-form-label"> kelurahan</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="kelurahan atau desa" maxlength="100">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="kecamatan" class="col-form-label">Kecamatan</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="kecamatan">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="rtrw" class="col-form-label">Rt / Rw</label>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="rtrw" id="rtrw" class="form-control" placeholder="RT / RW">
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary form-control">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
{{--            User Detail --}}
            <div class="col-lg-4">

            </div>
        </div>
    </div>
@endsection
