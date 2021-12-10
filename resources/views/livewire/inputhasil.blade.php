<div>
    <form wire:submit.prevent="savehasil">
    <div class="row">
        <div class="col-lg-2">
            <select wire:model="resultid" name="" class="form-select" id="">
                <option value="#">Pilih Pasaran</option>
                @forelse($hasil as $data)
                    <option value="{{ $data->id }}">{{ $data->pasaran }}</option>
                @empty
                    <option value="#">Tdk ada market</option>
                @endforelse
            </select>
            <div class="card mt-1">
                <div class="card-header">
                    Hadiah Utama
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="col-form-label">1st Prize</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="hadiahsatu" type="text" class="form-control" name="" id="">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="col-form-label">2nd-prize</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="hadiahdua" type="text" class="form-control" name="" id="">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="col-form-label">3rd-prize</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="hadiahtiga" type="text" class="form-control" name="" id="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-1">
                <div class="card-header">
                    Starter Prize
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Starter 1</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="startersatu" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Starter 2</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="starterdua" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Starter 3</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="startertiga" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button class="mt-1 form-control btn-primary text-white">Update Hasil</button>
        </div>

        <div class="col-lg-2">
            <div class="card">
                <div class="card-header">
                    Consolation Prize
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 1</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol1" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 2</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol2" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 3</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol3" type="text" name="" id="" class="form-control">
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mt-1">
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 4</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol4" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 5</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol5" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 6</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol6" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 7</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol7" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 8</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol8" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 9</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol9" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th rowspan="2">tanggal</th>
                        <th rowspan="2">Periode</th>
                        <th colspan="3">Hadiah-Utama</th>
                        <th colspan="3">Starter-Prize</th>
                        <th colspan="9">Consolation</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tablehasil as $table)
                            <tr>
                                <td>{{ date('y-m-d', strtotime($table->periode)) }}</td>
                                <td>{{ $table->id }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(0) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(1) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(2) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(3) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(4) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(5) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(6) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(7) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(8) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(9) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(10) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(11) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(12) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(13) }}</td>
                                <td>{{ $table->tabelhasil->pluck('hasil')->get(14) }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="15">No Datas Available</td>
                            </tr>
                    @endforelse

                </tbody>
            </table>

            <div>
                {{ $tablehasil->links() }}
            </div>
        </div>

    </div>
    </form>
</div>
