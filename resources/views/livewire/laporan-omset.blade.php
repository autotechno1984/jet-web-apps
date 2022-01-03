<div>
    <div class="row">
        <div class="col-lg-2">
            <select wire:model="pasarans" name="pasaran" id="" class="form-select">
                <option value="0">Pilih Market Berjalan</option>
                @forelse($pasaran as $data)
                    <option value="{{ $data->id }}">{{ $data->pasaran }}</option>
                @empty
                    <option value="">Tidak ada pasaran</option>
                @endforelse
            </select>
        </div>

        <div class="col-lg-2">
            <select wire:model="kode" name="kode" id="" class="form-select">
                <option value="0">Kode </option>
                <option value="4D">4D</option>
                <option value="3D">3D</option>
                <option value="2D">2D</option>
                <option value="CLB">COLOK-BEBAS</option>
                <option value="CLN">COLOK-NAGA</option>
                <option value="CLJ">COLOK-JITU</option>
                <option value="CLM">COLOK-MACAU</option>
                <option value="50UM">5050 UMUM</option>
                <option value="50KB">5050 KOMBINASI</option>
                <option value="50SP">5050 SPESIAL</option>
                <option value="MCU">MACAU</option>
                <option value="DSR">DASAR</option>
                <option value="SHIO">SHIO</option>
            </select>
        </div>

        <div class="col-lg-1">
            <input wire:model="caridata" type="text" name="" id="" class="form-control" placeholder="Cari Angka">
        </div>
        <div class="col-lg-1">
            <button wire:click="generatepdf" class="btn-primary form-control">Export</button>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-lg-8">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Inv-ID</th>
                        <th>Pasaran</th>
                        <th>Username</th>
                        <th>Kode</th>
                        <th>Posisi</th>
                        <th>Data</th>
                        <th>Amount</th>
                        <th>Total</th>
                        <th>Tgl-Beli</th>
                    </tr>
                </thead>
                <tbody>

                        @forelse($omset as $data)
                            <tr>
                                <td>{{ $data->invoice_id }}</td>
                                <td>{{ $pasaran->where('id',$data->result_id)->pluck('pasaran')->first() }}</td>
                                <td>{{ $username->where('id', $data->user_id)->pluck('username')->first() }}</td>
                                <td>{{ $data->kode }}</td>
                                <td>{{ $data->posisi }}</td>
                                <td>{{ $data->data }}</td>
                                <td>{{ $data->amount }}</td>
                                <td>{{ $data->total }}</td>
                                <th>{{ $data->tgl_beli }}</th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">Tidak ada data</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
