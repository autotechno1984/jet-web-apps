@extends('layouts.admin-panel')
@section('winloseinvoicedetail')
    <div style="margin:10px 20px 0 20px;">
        <div class="row">
            <div class="col-lg-1">
                <button class="btn btn-info form-control"><a href="{{ route('admin.winloseagendetail', [$id]) }}">Back</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <h6>Username : {{ $users->where('id', $resultid)->pluck('username')->first() }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No.Inv</th>
                            <th>Amount</th>
                            <th>Diskon</th>
                            <th>Win-Lose</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($invoice as $data)
                            <tr>

                                <td><a href="{{ route('admin.invoicedetailuser', [$data->id]) }}">{{$data->id}}</a></td>
                                <td>{{ number_format($data->amount) }}</td>
                                <td>{{ number_format($data->amount - $data->total) }}</td>
                                <td style="color:{{ ($data->winLose > 0) ?'blue;':'red;' }}">{{ number_format($data->winLose) }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
