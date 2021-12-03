@extends('layouts.app')
@section('statement')
    <div class="container mt-1">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
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

                            </div>
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
                                <table class="table table-bordered table-striped text-center">
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
                                                <td colspan="4"></td>
                                            </tr>
                                        @endforelse

                                        </div>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

@endsection
