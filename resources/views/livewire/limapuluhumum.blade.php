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
    <h3 class="text-center text-success shadow">50 - 50 UMUM</h3>
    <table class="table">
        <tbody>
            <tr>
                <td>#</td>
                <td>Tebak</td>
                <td>Amount</td>
                <td>Kei</td>
            </tr>
                    @for($i = 1 ; $i <= 6 ;$i++)
                    <tr>
                        <td><label for="" class="col-form-label">{{ $i }}</label></td>
                        <td><input wire:model="data.{{$i}}" class="form-control" type="text" name="" id="" readonly value="BESAR"></td>
                        <td><input wire:model="amount.{{$i}}" class="form-control" type="text" name="" id="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4">@error('amount.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror</td>
                        <td><label for="" class="col-form-label">Kei</label></td>
                    </tr>
                    @endfor
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button wire:click="createinvoice" class="btn btn-primary form-control w-50">Simpan</button></td>
                        <td></td>
                    </tr>
        </tbody>
    </table>
</div>
