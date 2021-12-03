@extends('layouts.app')
@section('invoicedetail')
    <div class="container">
        <div class="row mt-1">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6">
                <a href="{{ route('statement') }}" class="btn btn-dark">Back</a>
            </div>

        </div>
        <div class="row mt-1">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>Inv ID</th>
                            <th>Periode</th>
                            <th>Pasaran</th>
                            <th>Kode</th>
                            <th>Psi</th>
                            <th>Data</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoicedetail as $data)
                            <tr>
                                <td>{{ $data->invoice_id }}</td>
                                <td>{{ $data->result_id }}</td>
                                <td>{{ $pasaran }}</td>
                                <td>{{ $data->kode }}</td>
                                <td>{{ $data->posisi }}</td>
                                <td>{{ $data->data }}</td>
                                <td>{{ number_format($data->amount) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $invoicedetail->links() }}
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
@endsection
