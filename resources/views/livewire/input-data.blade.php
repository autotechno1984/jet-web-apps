<div>
    <div class="row">
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('danalimit'))
                <div class="alert alert-danger">
                    {{ session('danalimit') }}
                </div>
            @endif
            @if (session()->has('Tutup'))
                <div class="alert alert-danger">
                    {{ session('Tutup') }}
                </div>
            @endif
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    DATA AGEN
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="agenid" class="col-form-label">UserID
                            </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" wire:model.defer="username" wire:keydown.enter="finddata" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="namaagen" class="col-form-label">nama agen
                            </label>
                        </div>
                        <div class="col-6">
                            <label for="namaagen" class="col-form-label"><span>{{ $namaagen }}</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="namaagen" class="col-form-label">ID Agen
                            </label>
                        </div>
                        <div class="col-6">
                            <label for="namaagen" class="col-form-label"><span>{{ $userid }}</span></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="kredit" class="col-form-label">Kredit
                            </label>
                        </div>
                        <div class="col-6">
                            <label for="kredit" class="col-form-label"><span>{{ $kredit }}</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card {{ $nomor }}">
                <div class="card-header bg-danger text-white ">
                    Input Data Nomor
                </div>
                <div class="card-body">
                    <div class="row mt-2">

                        <div class="col-6">
                            <label for="pasaran" class="col-form-label">Pasaran</label>
                        </div>

                        <div class="col-6">
                            <select name="pasaran" id="" wire:model="pasaran" class="form-select">
                                <option >Pilih Salah Satu Pasaran</option>
                                @foreach($datamarket as $market)
                                    <option value="{{ $market->id }}">{{ $market->pasaran }} - {{ $market->id }}</option>
                                @endforeach
                            </select>
                            @error('pasaran') <span class="error text-danger" style="font-size:12px;">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="No Nota" class="col-form-label">No Nota</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" wire:model="nota" name="" id="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3">
                            @error('nota') <span class="error text-danger" style="font-size:12px;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">4D-3D-2D</div>
                        <div class="col-4">Nominal</div>
                        <div class="col-1">BB</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <input type="text" wire:model="angka" name="nomor" id="nomor" onkeydown="if(event.keyCode == 13 && this.value.length > 1) document.getElementById('nominal').focus();" class="form-control" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                            @error('angka') <span class="error text-danger" style="font-size:12px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-4">
                            <input type="text" wire:model="nominal" wire:keydown.enter="adddata" onkeydown="if(event.keyCode == 13 && this.value > 0) document.getElementById('nomor').focus();" name="nominal" id="nominal" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="6">
                            @error('nominal') <span class="error text-danger" style="font-size:12px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-1">
                            <input type="checkbox" class="form-check" id="bb" wire:model="bolakbalik">
                        </div>
                        <div class="col-3">
                            <button class="form-control btn btn-danger form-control" onclick="document.getElementById('nomor').focus();" wire:click.prevent="tambahdata">+</button>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="Simpan data" class="col-form-label">Silahkan Cek Data Dengan Benar</label>
                        </div>
                        <div class="col-6">
                            <button  class="btn btn-primary form-control" wire:click.prevent="saveinvoice">Simpan Data</button>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="Total" class="col-form-label">TOTAL</label>
                        </div>
                        <div class="col-6">
                            <label for="Total" class="col-form-label">{{ number_format($datainvoicetemp->sum('amount'),2) ?? 0 }}</label>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <label for="Diskon" class="col-form-label">DISKON</label>
                        </div>
                        <div class="col-6">
{{--                            <label for="Diskon" class="col-form-label">{{number_format($datainvoicetemp->sum('amount'),2) - number_format($datainvoicetemp->sum('total'),2)  }}</label>--}}
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <label for="GrandTotal" class="col-form-label">GRAND TOTAL</label>
                        </div>
                        <div class="col-6">
                            <label for="GrandTotal" class="col-form-label text-danger font-weight-bold" >{{ number_format($datainvoicetemp->sum('total'),2) ?? 0 }}</label>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <label for="JumlahAngka" class="col-form-label">Jumlah Angka</label>
                        </div>
                        <div class="col-6">
                            <label for="JumlahAngka">{{ $datainvoicetemp->count('nomor') }}</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-4 {{ $nomor }}">
            <div class="col-5">

            </div>
            <div class="card text-center ">
                <div class="card-header bg-light">
                    Data Nomor
                </div>
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-5">
                            <button class="btn btn-danger form-control" wire:click.prevent="hapusinvoice">Hapus Semua</button>
                        </div>
                    </div>


                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nominal</th>
                            <th>Kode</th>
                            <th>Del</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datainvoicetemp->where('user_id', ) as $invoicetemp)
                            <tr>
                                <td>{{ $invoicetemp->data }}</td>
                                <td>{{ $invoicetemp->amount }}</td>
                                <td>{{ $invoicetemp->kode }}</td>
                                <td><a style="box-shadow: none; border:1px solid white;" wire:click.prevent="deleteInvoice({{ $invoicetemp->id }})" class="btn"><i class="fa-solid fa-trash-can" style="color:red;"></i></a></td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
