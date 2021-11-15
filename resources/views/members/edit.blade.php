@extends('layouts.admin-panel')
@section('users.edit')
<div style="margin-left:20px; margin-right:20px; margin-top:10px;">
    <div class="row">
        {{--            User Login   --}}
        <div class="col-lg-4">

            <form action="#" method="POST">
                @csrf
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
                                <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" maxlength="12" readonly>
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
                                    <option value="1">Agent</option>
                                    <option value="2">Member</option>
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
                                <button class="btn btn-warning form-control">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card mt-1">
                <div class="card-header bg-danger text-white">
                    Change Password
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="newpassword" id="newpassword" class="form-control" placeholder="New Password" maxlength="12">
                        </div>
                        <div class="col-lg-6">
                            <button class="form-control btn-danger text-white">Change Password</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--            User Detail --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white font-weight-bold">
                    Bank Information | Maximal 3 Bank
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                                    <label for="bank" class="col-form-label">Bank</label>
                        </div>

                        <div class="col-lg-6">
                            <select name="bank" id="bank" class="form-select">
                                <option selected>Nama Bank</option>
                                <option value="">BCA</option>
                                <option value="">BNI</option>
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
                </div>
            </div>
            <div class="card mt-1">
                <div class="card-header bg-primary text-white">
                    Games - Limit
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="games" class="col-form-label">
                                Games
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <select name="games" id="games" class="form-select">
                                <option selected>Pilih Game</option>
                                <option value=""></option>
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
                            <button class="btn btn-primary form-control">Set Limit Default</button>
                        </div>
                        <div class="col-lg-6">
                            <a href="#" class="btn btn-info form-control">Simpan or Update</a>
                        </div>
                    </div>
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

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

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
                            <tr>
                                <td>BCA</td>
                                <td>0612520089</td>
                                <td>Kristiyanto</td>
                                <td><a href="#" class="btn btn-sm btn-danger ">DEL</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header bg-warning">
                    Referall dan upline id
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="referrallid" class="col-form-label">
                                Referall ID
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="referallid" id="referallid" placeholder="Referall-id" readonly>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="uplineid" class="col-form-label">
                                Upline id
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="uplineid" id="uplineid" placeholder="Upline - ID">
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
                                <option value="0">Non-Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="downline" class="col-form-label">Jumlah Downline</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="downline" id="downline" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">

                        </div>

                        <div class="col-lg-6">
                            <a href="#" class="btn btn-danger form-control">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
