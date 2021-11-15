@extends('layouts.app')
@section('transaksi')
    <div class="container" style="overflow-y: auto;">
        <div class="row mt-1">
            @include('flash-message')
            <div class="col-lg-4 mt-1 " >
                <div class="card" >

                    <div class="card-header bg-primary text-white" >
                        Deposit
                    </div>

                    @if(Auth::user()->status == 6)
                        <div class="card-body">
                           <p>Anda Tidak Bisa Melakukan Deposit.</p>
                           <p>Untuk Penambahan Kredit Silahkan Hubungi Admin</p>
                        </div>
                    @else
                        <div class="card-body"  >
                            <form action="{{ route('deposit') }}" method="POST">
                                @csrf

                                <div class="form-floating mt-1">
                                    <select class="form-select" name="sumberbank" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>Pilih Bank</option>
                                        @foreach($userBankDetail as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->nama_bank }} - {{ $data->nomor_bank }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect" style="font-weight: bold; color:blue;">Sumber Rekening Deposit</label>
                                </div>
                                <div class="form-floating mt-1">
                                    <select class="form-select" name="tujuanbank" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>Pilih Bank</option>
                                        @foreach($bank as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->nama_bank }} - {{ $data->nomor_akun }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect" style="font-weight: bold; color:red;">Tujuan Bank Deposit</label>
                                </div>
                                <div class="form-floating mb-3 mt-1">
                                    <input type="text" class="form-control" name="nominal" id="floatingInput" placeholder="nominal" minlength="4" maxlength="9">
                                    <label for="floatingInput">Nominal</label>
                                </div>
                                <button class="form-control btn-primary">Deposit</button>
                            </form>

                            @isset($depositpending)

                                <div class="alert-warning mt-1" style="display: block;padding:5px; border-radius: 5px;">

                                    <table>
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td style="font-weight: bold; color:red;">Deposit Sedang diproses !! </td>
                                        </tr>
                                        <tr style="color:red;">
                                            <td>Bank Tujuan</td>
                                            <td>:</td>
                                            <td>{{ $bank->where('id', $depositpending->id_bank_detail)->pluck('nama')->first() }} - {{ $bank->where('id', $depositpending->id_bank_detail)->pluck('nama_bank')->first() }} - {{ $bank->where('id', $depositpending->id_bank_detail)->pluck('nomor_akun')->first()  }}</td>
                                        </tr>
                                        <tr style="color:blue;">
                                            <td>Bank Deposit</td>
                                            <td>:</td>
                                            <td>{{ $userBankDetail->where('id', $depositpending->user_bank_detail)->pluck('nama')->first() }} - {{ $userBankDetail->where('id', $depositpending->user_bank_detail)->pluck('nama_bank')->first() }} - {{ $userBankDetail->where('id', $depositpending->user_bank_detail)->pluck('nomor_bank')->first() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td>:</td>
                                            <td style="font-weight: bold;">{{ number_format($depositpending->amount) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Deposit </td>
                                            <td>:</td>
                                            <td>{{ $depositpending->data_request }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                            @endisset

                        </div>
                    @endif()

                </div>
            </div>
            <div class="col-lg-4 mt-1">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        Withdraw
                    </div>
                    @if(Auth::user()->status == 6)
                        <div class="card-body">
                            <p>Anda Tidak Bisa Melakukan Withdraw.</p>
                            <p>Untuk Withdraw Silahkan Hubungi Admin</p>

                        </div>
                    @else
                        <div class="card-body">

                            <form action="{{ route('withdraw') }}" method="POST">
                                @csrf

                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" name="sumberbank" aria-label="Floating label select example">
                                        <option selected>Pilih Bank</option>
                                        @foreach($userBankDetail as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->nama_bank }} - {{ $data->nomor_bank }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect" style="color:red; font-weight: bold;">Rekening Tujuan withdraw</label>
                                </div>
                                <div class="form-floating mb-3 mt-1">
                                    <input type="text" name="nominal" class="form-control" id="floatingInput" placeholder="nominal" minlength="3" maxlength="9">
                                    <label for="floatingInput" style="color:red;">Nominal</label>
                                </div>
                                <button class="form-control btn-danger">Withdraw</button>

                            </form>

                            <div class="alert-warning">
                                <table>
                                    @isset($wdpending)
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>Penarikan sedang diproses.. </td>
                                        </tr>
                                        <tr>
                                            <td>Bank Tujuan</td>
                                            <td>:</td>
                                            <td>{{ $userBankDetail->where('id', $wdpending->user_bank_detail)->pluck('nama')->first() }} - {{ $userBankDetail->where('id', $wdpending->user_bank_detail)->pluck('nama_bank')->first() }} - {{ $userBankDetail->where('id', $wdpending->user_bank_detail)->pluck('nomor_bank')->first() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td>:</td>
                                            <td>{{ number_format($wdpending->amount * -1) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Withdraw</td>
                                            <td>:</td>
                                            <td>{{ $wdpending->data_request }}</td>
                                        </tr>
                                    @endisset
                                </table>
                            </div>

                        </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-4 mt-1">
                <div class="card">
                    <div class="card-header bg-opacity-50" style="background: #a0aec0; color:black;">
                        Data Rekening. Maximal 3 Rekening.
                    </div>
                    <div class="card-body">
                        <form action="{{ route('datarekeninguser') }}" method="POST" >
                            @csrf
                            <div class="form-floating">
                                <select class="form-select" name="bankid" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected>Bank / E-Wallet</option>

                                    @foreach($banks as $data)
                                        <option value="{{ $data->id }}" style="font-weight: bold">{{ $data->nama }} </option>
                                    @endforeach

                                </select>
                                <label for="floatingSelect">Pilih Bank</label>
                            </div>
                            <div class="form-floating mt-1">
                                <input type="text" name="nomorrekening" class="form-control " id="floatingInputInvalid" placeholder="Nomor Rekening" maxlength="20">
                                <label for="floatingInputInvalid">Nomor rekening bank / e-wallet</label>
                            </div>
                            <div class="form-floating mt-1">
                                <input type="text" name="namarekening" class="form-control " id="floatingInputInvalid" placeholder="Nama Rekening" maxlength="30">
                                <label for="floatingInputInvalid">Nama Rekening</label>
                            </div>
                            <button class="mt-1 btn-primary form-control">Simpan Data Rekening</button>

                        </form>

                        <table class="table table-bordered text-center mt-1">
                            <thead style="background: #718096; color:white;">
                            <tr>
                                <th>Bank</th>
                                <th>Nmr Rekening</th>
                                <th>Nama Rekening</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userBankDetail as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nama_bank }}</td>
                                    <td>{{ $data->nomor_bank }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
