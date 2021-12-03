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
                    <form action="{{ route('admin.addcontact') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <select class="form-select" name="medsos" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected>Pilih Media Sosial</option>
                                    <option value="whatsapp">whatsapp-1</option>
                                    <option value="whatsapp2">whatsapp-2</option>
                                    <option value="whatsapp3">whatsapp-3</option>
                                    <option value="facebook">facebook</option>
                                    <option value="instagram">instagram</option>
                                    <option value="youtube">youtube</option>
                                    <option value="tiktok">tiktok</option>
                                </select>
                                <label for="floatingSelect">Pilih nama Media Sosial</label>
                            </div>
                            <div class="form-floating mb-3 mt-2" >
                                <input type="text" name="url" class="form-control" id="floatingInput" placeholder="Url Link">
                                <label for="floatingInput">Url / Link</label>
                            </div>
                            <button class="form-control btn-primary">Simpan Data</button>
                        <table class="table table-bordered text-center mt-1">
                            <thead style="background:#aaaaaa ">
                                <tr>
                                    <th>Aplikasi</th>
                                    <th>Url / link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($dataContact as $data)
                                    <tr>
                                        <td>{{ $data->aplikasi }}</td>
                                        <td>{{ $data->url }}</td>
                                        <td>{{ $data->id }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Data</td>
                                    </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                    </form>
                </div>
            </div>

{{--            Banner Depan--}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Banner Depan Maximal 5 Banner
                    </div>

                         <div class="card-body">
                             <form action="{{ route('admin.addbanner') }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <label for="posisi" class="col-form-label">Posisi Banner</label>
                                     </div>
                                     <div class="col-lg-6">
                                         <input type="number" class="form-control" name="posisi" id="" min:1 max:10>
                                     </div>
                                 </div>
                                 <div class="row mt-1">
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
                                    <input class="form-control" name="banner" type="file" id="formFileMultiple" accept=".png, .jpg, .jpeg" >
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
                             </form>
                        <div class="row mt-1">
                           <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Posisi</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    @forelse($banner as $item)

                                        <tr>
                                            <td>{{ $item->posisi }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->id }}</td>
                                        </tr>

                                    @empty

                                    @endforelse
                               </tbody>
                           </table>
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
                        <form action="{{ route('admin.addvideo') }}" method="POST">
                         @csrf

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

                                <textarea name="url" id="" rows="3" class="form-control"></textarea>

                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <button class="form-control btn-warning">Simpan atau Ubah</button>
                            </div>
                        </div>
                        </form>
                        <div class="row mt-1">
                            <table class="table table-bordered text-center">
                                <thead style="background: #aaaaaa">
                                    <tr>
                                        <th>Periode</th>
                                        <th>link</th>
                                        <th>Tanggal Upload</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($video as $item)
                                        <tr>
                                            <td>{{ $item->periode }}</td>
                                            <td>{{ $item->url }}</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="3">Blm Ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $video->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
