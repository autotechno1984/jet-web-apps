<div style="overflow:auto;">

    <div class="row">
        <div class="col-lg-2">
            <select wire:model="dataid" name="pasaran" id="" class="form-select">
                @forelse($pasaran as $data)
                    <option value="{{ $data->id }}">{{ $data->pasaran }}</option>
                    @empty
                    <option value="">Tdak Ada pasaran</option>
                @endforelse
            </select>
        </div>
    </div>

    <div class="row mt-1">

        <div class="col-lg-2">
            <h6>All</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($invdetailkode as $data)
                    <tr>
                         <td>{{ $data->kode }}</td>
                         <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                      <tr>
                          <td colspan="2">tdk ada data</td>
                      </tr>
                @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td>{{ number_format($invdetailkode->sum('total')) }}</td>
                    </tr>
                </tfoot>
            </table>

        </div>
        <div class="col-lg-2">
            <h6>4D</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nomor</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($empatangka->where('kode','4D') as $data)
                        <tr>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->data }}</td>
                            <td>{{ number_format($data->total) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">tdk ada data</td>
                        </tr>
                    @endforelse
                    {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                        <td>{{ number_format($empatangka->where('kode','4D')->sum('total')) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>3D</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','3D') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','3D')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>2D</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','2D') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','2D')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>COLOK - COLOK BEBAS - CLB</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','CLB') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','CLB')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>COLOK - COLOK MACAU - CLM</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','CLM') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','CLM')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>

    <div class="row mt-1">
        <div class="col-lg-2">
            <h6>COLOK - COLOK JITU - CLJ</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>posisi</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','CLJ') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->posisi }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ number_format($empatangka->where('kode','CLJ')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>COLOK - COLOK NAGA- CLN</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','CLN') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','CLN')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>50-50 UMUM 50UM</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','50UM') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','50UM')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>50-50 SPESIAL 50SP</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Posisi</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','50SP') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->posisi }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td colspan="2">{{ number_format($empatangka->where('kode','50SP')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>50-50 Kombinasi 50KB</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Posisi</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','50KB') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->kombinasi }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td colspan="2">{{ number_format($empatangka->where('kode','50KB')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>MACAU - MCU</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Posisi</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','MCU') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->posisi }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td colspan="2">{{ number_format($empatangka->where('kode','MCU')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-lg-2">
            <h6>DASAR - DSR</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','DSR') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','DSR')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-2">
            <h6>SHIO</h6>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @forelse($empatangka->where('kode','SHIO') as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">tdk ada data</td>
                    </tr>
                @endforelse
                {{ $empatangka->links() }}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ number_format($empatangka->where('kode','SHIO')->sum('total')) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
