@extends('layouts.admin-panel')
@section('bencuttambah')
    <div style="margin:10px 20px 0px 20px;">
        <form action="{{ route('admin.tambahbencut') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-2">
                <label for="Tanggal" class="col-form-label">Tanggal</label>
            </div>
            <div class="col-2"><input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" id="tanggal">
                @error('tanggal')
                <span    class="alert text-danger">{{ $message }}</span>
                @enderror</div>

        </div>
        <div class="row mt-1">
            <div class="col-2">
                <label for="gambar" class="col-form-label">Gambar</label>
            </div>
            <div class="col-3">
                <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar">
                @error('gambar')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-2">
                <label for="Keterangan" class="col-form-label">Keterangan</label>
            </div>
            <div class="col-3">
                <textarea name="keterangan" id="keterangan" cols="50" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-2">

            </div>
            <div class="col-3">
                <button  class="btn btn-primary w-50">Tambah baru</button>
            </div>
        </div>
        </form>
    </div>
@endsection
