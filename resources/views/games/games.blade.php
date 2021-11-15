@extends('layouts.admin-panel')
@section('games')
    <div class="" style="margin-top:10px; margin-left:20px; margin-right: 20px;">
        <div class="row">

            <div class="col-lg-4">
                <form action="{{ route('games.store') }}" method="POST">
                    @csrf
                    <div class="card">
                    <div class="card-header">
                        Games Togel
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <label for="kategori" class="col-form-label">Kategori</label>
                            </div>
                            <div class="col-lg-4">
                                <select name="kategori" id="kategori" class="form-select">
                                    <option selected>pilih Kategori</option>
                                    <option value="4D">4D</option>
                                    <option value="COLOK">COLOK</option>
                                    <option value="5050">50-50</option>
                                    <option value="MACAU">MACAU</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-5">
                                <label for="kode" class="col-form-label">Kode</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="kode" id="kode" class="form-control" placeholder="Kode Game" maxlength="5">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-5">
                                <label for="nama" class="col-form-label">Nama game</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="nama game">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-5">
                                <label for="hadiah" class="col-form-label">Hadiah</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="hadiah" id="hadiah" class="form-control @error('hadiah') is-invalid @enderror" value="0">
                                @error('hadiah')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-5">
                                <label for="diskon" class="col-form-label">Diskon</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="diskon" id="diskon" class="form-control @error('diskon') is-invalid @enderror" value="0">
                                @error('diskon')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-1">
                                <div>
                                    <label for="" class="col-form-label">%</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-5">
                                <label for="kei" class="col-form-label">Kei</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="kei" id="kei" class="form-control @error('kei') is-invalid @enderror" value="0">
                                @error('kei')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-5">

                            </div>
                            <div class="col-lg-7">
                                <button class="btn btn-primary form-control">Save Or Edit</button>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
            </div>

            <div class="col-lg-6">
               <table class="table table-bordered text-center">
                   <thead style="background: #718096; color:white;">
                        <tr>
                            <th>Category</th>
                            <th>Kode</th>
                            <th>Name</th>
                            <th>Hadiah</th>
                            <th>Diskon</th>
                            <th>Kei</th>
                        </tr>
                   </thead>
                   <tbody>
                        @forelse($games as $game)
                            <tr>
                                <td>{{ $game->kategori }}</td>
                                <td>{{ $game->kode }}</td>
                                <td>{{ $game->nama }}</td>
                                <td>{{ number_format($game->hadiah,2
) }}</td>
                                <td>{{ number_format($game->diskon,2) }}</td>
                                <td>{{number_format($game->kei,2)}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"><strong>Belum ada data</strong></td>
                            </tr>
                        @endforelse
                   </tbody>
               </table>
            </div>
        </div>
    </div>
@endsection
