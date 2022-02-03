@extends('layouts.admin-panel')
@section('bencut')
    <div style="margin:10px 20px 0px 20px;">
        <div class="row">
            <div class="col-3">
                <a href="{{ route('admin.bencut-tambah') }}" class="btn btn-primary">Buat Baru</a>
                <a href="{{ route('admin.bencuthapussemua') }}" class="btn btn-danger">Hapus Semua</a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-10">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th >#</th>
                        <th >Tanggal</th>
                        <th >Keterangan</th>
                        <th >File Name</th>
                        <th >Edit</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($bencut as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->filename }}</td>
                        <td><a href="{{ route('admin.editbencut', [$data->id]) }}" class="btn-danger px-3 py-1">Hapus</a></td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Data</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
