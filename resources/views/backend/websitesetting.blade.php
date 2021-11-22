@extends('layouts.admin-panel')
@section('websetting')
    <div style="margin-top:10px; margin-left:20px; margin-right: 20px;">
        <div class="row">

{{--            Media Sosial & Whatsapp--}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Setting Media sosial & Whatsapp
                    </div>
                    <div class="card-body">
{{--                        whatsapp 1--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="whatsapp" class="col-form-label">Whatsapp</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="whatsapp" id="aplikasi" value="{{ $dataContact->where('aplikasi', 'whatsapp')->pluck('url')->first() }}" placeholder="Whatsapp-1 +628">
                            </div>
                        </div>
{{--                        whatsapp2--}}
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="whatsapp-2" class="col-form-label">Whatsapp-2</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="whatsapp2" value="{{ $dataContact->where('aplikasi', 'whatsapp-2')->pluck('url')->first() }}"id="aplikasi" placeholder="Whatsapp-2 +628">
                            </div>
                        </div>
{{--                        whatsapp3--}}
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="whatsapp-3" class="col-form-label">Whatsapp-3</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="whatsapp-3" id="whatsapp3" value="{{ $dataContact->where('aplikasi', 'whatsapp-3')->pluck('url')->first() }}" placeholder="Whatsapp-3 +628">
                            </div>
                        </div>
{{--                        Facebook--}}
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="facebook" class="col-form-label">Facebook</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="facebook" value="{{ $dataContact->where('aplikasi', 'facebook')->pluck('url')->first() }}" id="facebook" placeholder="Official Channel facebook">
                            </div>
                        </div>
{{--                        Instagram--}}
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="instagram" class="col-form-label">Instagram</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $dataContact->where('aplikasi', 'instagram')->pluck('url')->first() }}" placeholder="Official Channel instagram">
                            </div>
                        </div>
{{--                        Youtube--}}
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="youtube" class="col-form-label">Youtube</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="youtube" id="youtube" value="{{ $dataContact->where('aplikasi', 'youtube')->pluck('url')->first() }}" placeholder="official channel youtube">
                            </div>
                        </div>
{{--                        Tiktok--}}
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="tiktok" class="col-form-label">Tiktok</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="tiktok" id="tiktok" value="{{ $dataContact->where('aplikasi', 'tiktok')->pluck('url')->first() }}" placeholder="Official Channel Tiktok">
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary form-control" type="submit">Simpan / Update</button>
                            </div>
                        </div>

                        <table class="table table-bordered text-center mt-1">
                            <thead style="background:#aaaaaa ">
                                <tr>
                                    <th>Apliasi</th>
                                    <th>Url / link</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($dataContact as $data)
                                    <tr>
                                        <td>{{ $data->aplikasi }}</td>
                                        <td>{{ $data->url }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No Data</td>
                                    </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

{{--            Banner Depan--}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Banner Depan Maximal 5 Banner
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="nama" class="col-form-label">Nama Banner</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="namabanner" id="namabanner" placeholder="namabanner">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-12">
                                <div >
                                    <label for="formFileMultiple" class="form-label">Pilih Banner Extension .jpg, .jpeg</label>
                                    <input class="form-control" type="file" id="formFileMultiple" accept=".png, .jpg, .jpeg" >
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary form-control">Upload</button>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" aria-label="Recipient's username" aria-describedby="button-addon2" disabled>
                                    <button class="btn btn-danger" type="button" id="button-addon2">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            Link Youtube Hasil--}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        Masukan Link Youtube hasil
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="periode" class="col-form-label">Periode</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="periode" id="periode" placeholder="Periode">
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="" class="col-form-label">Link Youtube</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="linkyoutube" id="linkyoutube" class="form-control" placeholder="link youtube">
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <button class="form-control btn-warning">Simpan atau Ubah</button>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <table class="table table-bordered text-center">
                                <thead style="background: #aaaaaa">
                                    <tr>
                                        <th>Periode</th>
                                        <th>link</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
