@extends('layouts.admin-panel')
@section('transaksi')
    <div class="mt-1" style="margin-top:10px; margin-left:20px; margin-right:20px;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card ">
                    <div class="card-header text-white bg-primary">
                        Data Deposit
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead style="background: #718096; color:white;">
                            <tr>
                                <th>Nama</th>
                                <th>username</th>
                                <th>Kota</th>
                                <th>Waktu-Deposit</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Reject</th>
                                <th>Approved</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($depopending as $data)
                                <tr>
                                    <td style="padding-top:15px;">{{ Auth::user()->name }}</td>
                                    <td style="padding-top:15px;">{{ Auth::user()->username }}</td>
                                    <td style="padding-top:15px;">{{ Auth::user()->profile->kota }}</td>
                                    <td style="padding-top:15px;">{{ $data->data_request }}</td>
                                    <td style="padding-top:15px;">{{ number_format($data->amount) }}</td>
                                    <td><a href="#" class="btn btn-warning form-control disabled" >Pending</a></td>

                                    <form action="{{ route('depositreject' , [$data->id] ) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td><button class="btn btn-danger form-control" type="submit">Reject</button></td>

                                    </form>
                                    <form action="{{ route('depositapproved', [$data->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td><button class="btn btn-primary form-control" type="submit">Approved</button></td>
                                    </form>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Tidak ada Pengajuan Deposit</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-white bg-danger">
                        Data Withdraw
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead style="background: #718096; color:white;">
                            <tr>
                                <th>Nama</th>
                                <th>username</th>
                                <th>Kota</th>
                                <th>Waktu-withdraw</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Reject</th>
                                <th>Approved</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($wdpending as $data)
                                <tr>
                                    <td style="padding-top:15px;">{{ Auth::user()->name }}</td>
                                    <td style="padding-top:15px;">{{ Auth::user()->username }}</td>
                                    <td style="padding-top:15px;">{{ Auth::user()->profile->kota }}</td>
                                    <td style="padding-top:15px;">{{ $data->data_request }}</td>
                                    <td style="padding-top:15px;">{{ number_format($data->amount * -1) }}</td>
                                    <td><a href="#" class="btn btn-warning form-control disabled" >Pending</a></td>
                                    <form action="{{ route('withdrawreject', [$data->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <td><button class="btn btn-danger form-control" type="submit">Reject</button></td>
                                    </form>
                                    <form action="{{ route('withdrawapproved', [$data->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td>
                                            <button type="submit" class="btn btn-primary form-control">Approved</button></td>
                                    </form>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Tidak ada Pengajuan Deposit</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
