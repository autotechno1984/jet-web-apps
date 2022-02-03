@extends('layouts.admin-panel')
@section('editbencut')
    <div style="margin:10px 20px 0px 20px;">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('admin.bencut') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="tanggal" class="col-form-label">tanggal</label>
            </div>
            <div class="col-3">
                <input type="date" name="" id="" class="form-control" value="{{ (date('d-m-Y', strtotime($bencut->tanggal))) }}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-3">
                <label for="keterangan" class="col-form-label">Keterangan</label>
            </div>
            <div class="col-3">
                <textarea name="" id="" cols="50" rows="5" class="form-control">{{ $bencut->keterangan }}</textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-3">
                <label for="gambar" class="col-form-label">
                    Gambar
                </label>
            </div>
            <div class="col-3">
                <input class="form-control" type="file" name="gambar" id="gambar">
            </div>
        </div>
    </div>
@endsection
