<div>
    <div class="row">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <input wire:model.defer="search" type="date" class="form-control">
        </div>
        <div class="col-lg-1">
            <button wire:click.prevent="caridata" class="btn-outline-primary form-control">Cari</button>
        </div>
        <div class="col-lg-1">
            <button wire:click.prevent="today" class="btn-outline-primary form-control">Hari ini</button>
        </div>
        <div class="col-lg-1">
            <button wire:click.prevent="semalam" class="btn-outline-primary form-control">Semalam</button>
        </div>
        <div class="col-lg-1">
            <select name="periode" id="periode" wire:model.defer="periode" class="form-select">
                <option value="90">Periode</option>
                @foreach($pasaran as $data)
                    <option value="{{ $data->id }}">{{ $data->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <button wire:click.prevent="wlsubagen" class="btn-outline-primary form-control">Lap Agen dan Sub</button>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-lg-9">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>jlh</th>
                        <th>Pasaran</th>
                        <th>Tanggal</th>
                        <th>Omset</th>
                        <th>Diskon</th>
                        <th>Total</th>
                        <th>Win-Lose</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($datas as $item)

                        <tr>
                            <td><a href="{{ route('admin.winloseagendetail', [$item->result_id]) }}">{{ $item->member }}</a></td>
                            <td>{{ $pasaran->where('id', $item->result_id )->pluck('pasaran')->first() }}</td>
                            <td>{{ $item->tanggal  }}</td>
                            <td>{{ number_format($item->omset,2)  }}</td>
                            <td>{{ number_format($item->diskon,2)  }}</td>
                            <td>{{ number_format($item->omset,2) -  number_format($item->diskon,2) }}</td>
                            <td>{{ number_format($item->winlose,2)  }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Blm ada Data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
