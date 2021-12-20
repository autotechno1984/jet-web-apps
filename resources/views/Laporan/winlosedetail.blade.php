@extends('layouts.admin-panel')
@section('winloseagendetail')
    <div style="margin:10px 20px 0 20px;">
        <div class="row">
            <div class="col-lg-1">
                <button class="btn-info form-control"><a href="{{ route('admin.winloseagen') }}">Back</a></button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <h5>Periode : {{ $id }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>Total Inv</th>
                            <th>Username</th>
                            <th>Omset</th>
                            <th>Diskon</th>
                            <th>Win-Lose</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice as $data)
                            <tr>
                                <td><a href="{{ route('admin.winloseinvoicedetail', [$id, $data->user_id ]) }}">{{ $data->jumlah }}</a></td>
                                <td>{{ $users->where('id', $data->user_id)->pluck('username')->first() }}</td>
                                <td>{{ number_format($data->omset) }}</td>
                                <td>{{ number_format($data->diskon) }}</td>
                                <td>{{ number_format($data->winlose) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
