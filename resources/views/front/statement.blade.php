@extends('layouts.app')
@section('statement')
    <div class="container mt-1 overflow-auto" >
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header" style="background: #4aa0e6; color:white;">
                        Deposit - Withdraw - Kredit - Statement Selama 1 Minggu.
                    </div>
                    <div class="card-body">
                        <table class="table table-border text-center">
                            <thead style="background: #718096; color:white;">
                                <tr>
                                    <th>tgl-buat</th>
                                    <th>tgl-proses</th>
                                    <th>Tipe</th>
                                    <th>Amount</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                                <tbody>

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header" style="background: #2fa360; color:white;">
                        Member Win - Lose - Statement. Selama 1 Minggu.
                    </div>
                    <div class="card-body">
                        <table class="table table-border text-center">
                            <thead style="background: #718096; color:white;">
                            <tr>
                                <th>tgl-buat</th>
                                <th>tgl-proses</th>
                                <th>Tipe</th>
                                <th>Amount</th>
                                <th>Status</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
