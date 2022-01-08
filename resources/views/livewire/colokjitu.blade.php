<div>

    <div class="row">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <h3 class="text-center text-success shadow">COLOK JITU</h3>
        <table class="table">
            <tbody>
                <tr>
                    <td>#</td>
                    <td style="width:15%;">Nomor</td>
                    <td style="width:30%">Posisi</td>
                    <td style="width:25%">Jumlah</td>
                    <td style="width:15%">Hadiah</td>
                    <td style="width:15%">Diskon</td>
                </tr>
                @for($i = 1; $i <= 10; $i++)
                    <tr>
                        <td><label for="" class="col-form-label">{{ $i }}</label></td>
                        <td><input type="text" class="form-control" wire:model="nomor.{{$i}}" name="" id=""  readonly></td>
                        <td><select wire:model="posisi.{{$i}}" name="" id="" class="form-select">
                                <option value="0">Pilih</option>
                                <option value="1">AS</option>
                                <option value="2">KOP</option>
                                <option value="3">KEPALA</option>
                                <option value="4">EKOR</option>
                            </select></td>
                        <td><input type="text" wire:model="amount.{{$i}}" name="" id="" class="form-control" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >@error('amount.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror</td>
                        <td><label for="" class="col-form-label">{{$hadiah}}</label></td>
                        <td><label for="" class="col-form-label">{{$diskon}}</label></td>
                    </tr>
                @endfor
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2"><button wire:click="createinvoice" class="btn btn-primary form-control">Simpan</button></td>
                </tr>
            </tbody>
        </table>

</div>
