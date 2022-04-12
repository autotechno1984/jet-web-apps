<div style="overflow:auto;">

    <div class="row">
        <div class="col-lg-2">
            <select wire:model="dataid" name="pasaran" id="" class="form-select">
                <option value="#">pilih market anda</option>
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
    </div>
</div>
