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
    <div class="table-responsive">
        <?php $no = 1; $colok = 0 ?>
        <table class="table" >
            <thead>
            <tr>
                <td>No.</td>
                <td>Colok</td>
                <td>Jumlah</td>
                <td>Hadiah</td>
                <td>Diskon</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{1}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.1') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr>
            <tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{2}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.2') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr>
            <tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{3}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.3') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr>
            <tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{4}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.4') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr>
            <tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{5}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.5') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr><tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{6}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.6') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr>
            <tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{7}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.7') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr><tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{8}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.8') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr><tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{9}}" name="amount[]" id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"> @error('amount.9') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr><tr>
                <td><label for="" class="col-form-label">{{ $no++ }}</label></td>
                <td><input type="text" name="colok[]" id="" class="form-control text-center" value="{{ $colok++ }}" readonly></td>
                <td><input type="text" wire:model="amount.{{10}}" name="amount[]"  id="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control">@error('amount.10') <span class="error text-danger">{{ $message }}</span> @enderror</td>
                <td><label for="hadiah" class="col-form-label">{{ $hadiahclb }}</label></td>
                <td><label for="diskon" class="col-form-label">{{$diskonclb}}</label></td>

            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3"><label for="" class="col-form-label">Total : {{ array_sum($amount) }} </label></td>
                <td colspan="2"><button class="btn btn-primary form-control" wire:click.prevent="total">Simpan</button></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
