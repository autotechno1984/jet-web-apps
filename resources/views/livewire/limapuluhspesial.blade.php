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
    <h3 class="text-center text-success shadow">50-50 SPESIAL</h3>
    <table class="table">
        <tbody>
            <tr>
                <td>#</td>
                <td>Tebak</td>
                <td>Jumlah</td>
                <td>Hadiah</td>
                <td>Diskon</td>
            </tr>
            @for($i=1; $i <= 16; $i++)
            <tr>
                <td><label for="" class="col-form-label">{{$i}}.</label></td>
                <td><input wire:model="data.{{$i}}" type="text" name="" id="" class="form-control" value="GANJIL" readonly></td>
                <td><input wire:model="amount.{{$i}}"type="text" name="" id="" class="form-control" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">@error('amount.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="" class="col-form-label">{{$hadiah}}</label></td>
                <td><label for="" class="col-form-label">{{$diskon}}</label></td>
            </tr>
            @endfor

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2"><button wire:click="createinvoice" class="btn btn-primary form-control">Simpan</button></td>
        </tr>

        </tbody>
    </table>
</div>
