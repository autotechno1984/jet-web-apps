@extends('layouts.app')
@section('statement')
    <div class="container mt-1">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="row" >
                    <div class="col-lg-12" id="statementkredit">

                        <div class="row">
                            <div class="col-lg-5" >
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

                                @forelse($invoicewinlose as $item)
                                    <div id="winlosebox" style="margin-bottom:1px; border-radius:5px 5px 5px 5px;" class="shadow">
                                        <p>No.Inv : <span><a href="{{ route('statementdetail', [$item->id]) }}">{{ $item->id }}</a></span> </p>
                                        <p>Tanggal: {{ date("Y-m-d", strtotime($item->tgl_invoice)) }}</p>
                                        <p>Pasaran : <span>{{ $market->where('id', $item->result_id)->pluck('pasaran')->first()}} - {{ $item->result_id }}</span></p>
                                        <p>Amount : <span>{{  number_format($item->amount)  }}</span></p>
                                        <p>Diskon : <span>{{ number_format($item->amount - $item->total,2) }}</span></p>
                                        <p>Win-Lose : <span style="color:{{ ($item->winLose > 0) ? 'blue;' : 'red;' }}">{{ number_format($item->winLose) }}</span></p>
                                    </div>
                                @empty
                                    <div>
                                        <h6>No data</h6>
                                    </div>
                                @endforelse


                                <div>
                                    {{ $invoicewinlose->links() }}
                                </div>

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

                                @forelse($runningInvoice as $inv)
                                <div id="invoicerunning" style="margin-bottom:1px; border-radius:5px 5px 5px 5px;" class="shadow">
                                    <p>No.Inv : <span><a href="{{ route('invoicedetail', [$inv->id]) }}">{{ $inv->id }}</a></span> </p>
                                    <p>Tanggal: <span>{{ date("Y-m-d", strtotime($inv->tgl_invoice)) }}</span> </p>
                                    <p>Pasaran : <span>{{ $market->where('id', $inv->result_id)->pluck('pasaran')->first()}} - {{ $inv->result_id }}</span> </p>
                                    <p>Amount : <span>{{ number_format($inv->amount) }}</span></p>
                                    <p>Diskon : <span>{{ number_format($inv->amount - $inv->total) }}</span></p>
                                    <p>Total : <span>{{ number_format($inv->total) }}</span></p>
                                    <p>Status : <span>Running</span></p>
                                </div>

                                @empty
                                     <div class="text-center">
                                           <p>No Data</p>
                                     </div>
                                @endforelse

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
