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
    <h3 class="text-center text-success shadow">50 - 50 KOMBINASI</h3>
    <table class="table" >
        <tbody>
            <tr>
                <td>#</td>
                <td>Data</td>
                <td>Jumlah</td>
                <td>Hadiah</td>
                <td>Kei</td>
            </tr>
            @for($i=1; $i <= 12; $i++)
            <tr>
                <td><label for="" class="col-form-label">{{$i}}.</label> </td>
                <td><input wire:model="data.{{$i}}" type="text" name="" id="" class="form-control" value="MONO" readonly></td>
                <td><input wire:model="amount.{{$i}}"type="text" name="" id="" class="form-control" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">@error('amount.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="" class="col-form-label">{{ $hadiah }}</label></td>
                <td><label for="" class="col-form-label">{{ $diskon }}</label></td>
            </tr>
            @endfor
            <tr>
                <td></td>
                <td></td>
                <td><button wire:click="createinvoice" class="btn btn-primary form-control">Simpan</button></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
