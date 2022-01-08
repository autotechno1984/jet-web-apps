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
    <div>
        <?php $no =1 ?>
        <table class="table text-center" >
            <thead>
            <tr>
                <td >No.</td>
                <td >Nomor</td>
                <td >Jumlah</td>
                <td >Hadiah</td>
                <td >Diskon</td>
            </tr>
            </thead>
            <tbody>
            @for($i = 1 ; $i <= 10; $i++)
            <tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" wire:model="nomor.{{$i}}"  name="" id="" class="form-control shadow" maxlength="2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"></td>
                <td><input type="text" wire:model="amount.{{$i}}" name="" id="" class="form-control shadow" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" {{ (isset($nomor[$i]) && (strlen($nomor[$i]) == 2)) ? '' : 'readonly'  }}> @error('amount.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="Hadiah" class="col-form-label">{{ $hadiahclm }}</label></td>
                <td><label for="Diskon" class="col-form-label">{{ $diskonclm }}</label></td>
            </tr>
            @endfor
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2">
                    <button class="btn btn-primary form-control" wire:click="createinvoice">Simpan</button>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
