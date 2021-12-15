@extends('layouts.app')
@section('statementdetail')
    <div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="row mt-2">
                    <div class="col-lg-1">
                        <button class="btn btn-info" ><a href="{{ route('statement') }}">BACK</a></button>
                    </div>
                </div>
                <h4 class="mt-2">Invoice Detail</h4>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>Inv.ID</th>
                            <th>Kode</th>
                            <th>posisi</th>
                            <th>data</th>
                            <th>Amount</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoicedetail as $data)
                            <tr>
                                <td>{{ $data->invoice_id }}</td>
                                <td>{{ $data->kode }}</td>
                                <td>{{ $data->posisi }}</td>
                                <td>{{ $data->data }}</td>
                                <td>{{ number_format($data->amount) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
@endsection
