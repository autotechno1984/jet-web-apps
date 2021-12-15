@extends('layouts.app')
@section('statement')
    <div class="container mt-1">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-5">
                                <h5>Kredit Yang Diberikan  </h5>
                            </div>
                            <div class="col-lg-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-lg-6 text-right">
                                <h5>{{ number_format($givencredit->pluck('credit')->first()) }}</h5>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <h5>Menang Kalah </h5>
                                </div>
                                <div class="col-lg-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <h5 style="color:{{ ($danayangbisaditarik > 0) ? 'blue;' : 'red;' }}">{{ number_format($danayangbisaditarik) }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <h5>Kredit Yang Tersedia</h5>
                                </div>
                                <div class="col-lg-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <h5>{{ number_format($userkredit) }}</h5>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                History Transaksi
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                   <table class="table table-bordered table-striped text-center">
                                       <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>

                                            <th>Amount</th>
                                            <th>Balance</th>
                                        </tr>
                                       </thead>
                                       <tbody>
                                            @forelse($transaksi as $data)
                                                <tr>
                                                    <td>{{ $data->kategori }}</td>
                                                    <td>{{ $data->tanggal }}</td>

                                                    <td style="font-weight: bold; {{ ($data->amount < 0) ? 'color:red;' : 'color:blue;'  }}">{{ number_format($data->amount) }}</td>
                                                    <td>{{ number_format($data->balance) }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No Data</td>
                                                </tr>
                                            @endforelse
                                       </tbody>
                                   </table>
                                {{ $transaksi->links() }}
                            </div>

                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Laporan kalah Menang
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No.Inv</th>
                                            <th>Tanggal</th>
                                            <th>Pasaran</th>
                                            <th>amount</th>
                                            <th>Diskon</th>
                                            <th>Win-Lose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($invoicewinlose as $data)
                                            <tr>
                                                <td><a href="{{ route('statementdetail', [$data->id]) }}">{{ $data->id }}</a></td>
                                                <td>{{ date("Y-m-d", strtotime($data->tgl_invoice)) }}</td>
                                                <td>{{ $market->where('id', $data->result_id)->pluck('pasaran')->first() }}</td>
                                                <td>{{ number_format($data->amount) }}</td>
                                                <td>{{ number_format($data->amount - $data->total,2) }}</td>
                                                <td style="color:{{ ($data->winLose < 0) ? 'red;': 'black;' }}">{{ number_format($data->winLose) }}</td>
                                            </tr>
                                        @empty
                                                <tr>
                                                    <td colspan="6">No Data</td>
                                                </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                            <div></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Laporan Invoice Berjalan
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-bordered table-striped text-center" style="font-size:0.8rem;">
                                    <thead>
                                        <tr>
                                            <th>No.Inv</th>
                                            <th>Pasaran</th>
                                            <th>Jumlah</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($runningInvoice as $inv)
                                            <tr >
                                                <td ><a href="{{ route('invoicedetail', [$inv->id]) }}" >{{ $inv->id }}</a></td>
                                                <td>{{ $inv->result_id }}</td>
                                                <td>{{ number_format($inv->amount) }}</td>
                                                <td>{{ number_format($inv->amount - $inv->total) }}</td>
                                                <td>{{ number_format($inv->total) }}</td>
                                                <td>Proses</td>
                                            </tr>
                                         @empty
                                            <tr>
                                                <td colspan="6"></td>
                                            </tr>
                                        @endforelse

                                        </div>
                                    </tbody>
                            </table>
                            <div>
                                {{ $runningInvoice->links() }}
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

@endsection
