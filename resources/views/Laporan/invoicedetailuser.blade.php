@extends('layouts.admin-panel')
@section('invoicedetailuser')
    <div style="margin:10px 20px 0 20px;">

        <div class="row">
            <div class="col-lg-1">
                <button class="btn-info form-control"><a href="{{ url()->previous() }}">Back</a></button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No.inv</th>
                            <th>Posisi</th>
                            <th>Data</th>
                            <th>Amount</th>
                            <th>Hadiah</th>
                            <th>WinLose</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoicedetail as $data)
                            <tr>
                                <td>{{ $data->invoice_id }}</td>
                                <td>{{ $data->posisi }}</td>
                                <td>{{ $data->data }}</td>
                                <td>{{ number_format($data->amount) }}</td>
                                <td>{{ $data->hadiah }}</td>
                                @if($data->is_win == 1)
                                    <td style="color:blue;">{{ number_format(($data->amount * $data->hadiah) - $data->total) }}</td>
                                @else
                                    <td style="color:red;">{{ number_format($data->total * -1) }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
