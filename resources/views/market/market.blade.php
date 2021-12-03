@extends('layouts.admin-panel')
@section('markets')
    <div style="margin-top:10px; margin-left:20px; margin-right: 20px">
        @include('flash-message')
            <div class="row">

                <div class="col-lg-4">
                    <form action="{{ route('admin.market.store') }}" method="POST">
                        @csrf
                    <div class="card">
                        <div class="card-header">
                            Data Pasaran Baru
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="kode" class="col-form-label">Kode</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" maxlength="4" placeholder="Kode Pasaran | 4Digit">
                                    @error('kode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-form-label">Nama</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Pasaran">
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6">
                                    <label for="jambuka" class="col-form-label">Jam-Buka</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="time" name="jambuka" id="jambuka" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6">
                                    <label for="jamtutup" class="col-form-label">Jam-Tutup</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="time" name="jamtutup" id="jamtutup" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6">
                                    <label for="jammulai" class="col-form-label">Jam-Mulai</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="time" name="jammulai" id="jammulai" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6">
                                    <label for="alamatsitus" class="col-form-label">Alamat-Situs</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="alamatsitus" id="alamatsitus" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6">
                                    <label for="tipe" class="col-form-label">Tipe Market</label>
                                </div>
                                <div class="col-lg-6">
                                    <select name="tipe" id="tipe" class="form-select">
                                        <option selected>Pilih Tipe Pasaran</option>
                                        <option value="D">Nomor Tunggal</option>
                                        <option value="H">Hiburan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
                                    <button class="btn btn-primary form-control">Save Or Edit</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    </form>

                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <table class="table table-bordered text-center">
                            <thead style="background: #718096; color:white;">
                                <tr>
                                    <th>Kode</th>
                                    <th>Tipe</th>
                                    <th>Nama</th>
                                    <th>Jam-Buka</th>
                                    <th>Jam-Tutup</th>
                                    <th>Jam-Mulai</th>
                                    <th>Situs</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            @forelse($markets as $market)
                                <tr>
                                    <td>{{ $market->kode }}</td>
                                    <td>{{ $market->tipe }}</td>
                                    <td>{{ $market->nama }}</td>
                                    <td>{{ $market->jambuka }}</td>
                                    <td>{{ $market->jamtutup }}</td>
                                    <td>{{ $market->jammulai }}</td>
                                    <td>{{ $market->alamatsitus }}</td>
                                    <td>{{ $market->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"><strong>Blm Ada Data</strong></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
{{--                        {{ $markets->link() }}--}}
                    </div>
                </div>
            </div>
    </div>
@endsection
