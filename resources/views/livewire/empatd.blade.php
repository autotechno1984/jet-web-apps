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
    <div class="row">
        <div class="col-1">
            <select wire:model="line" class="form-select" name="" id="selectline">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table text-center">
                <tbody>
                    <tr>
                        <td>No.</td>
                        <td>Nomor</td>
                        <td>4D-Bet</td>
                        <td>3D-Bet</td>
                        <td>2D-Bet</td>
                        <td>BB</td>
                    </tr>
                    @for($i ; $i <= $line; $i++)
                    <tr>

                        <td>{{ $i }}</td>

                        <td><input type="text" wire:model="num.{{$i}}" wire:change.prevent="numchange" name="" id="{{$i}}" class="form-control" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" ></td>
                        <td><input type="text" wire:model="empatd.{{$i}}" name="" id="empat{{$i}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4" {{ (isset($num[$i]) && (strlen($num[$i]) >= 4)) ? '' : 'readonly'}}>  @error('empatd.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror </td>
                        <td><input type="text" wire:model="tigad.{{$i}}" name="" id="tiga{{$i}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4" {{ (isset($num[$i]) && (strlen($num[$i]) >= 3)) ? '' : 'readonly' }}>@error('tigad.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror</td>
                        <td><input type="text" wire:model.lazy="duad.{{$i}}" name="duad.{{$i}}" id="dua{{$i}}" class="form-control " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4" {{ (isset($num[$i]) && (strlen($num[$i]) >= 2)) ? '' : 'readonly' }}>@error('duad.'.$i) <span class="error text-danger">{{ $message }}</span> @enderror</td>
                        <td><input type="checkbox" wire:model="bb.{{$i}}" class="form-check" name="" id="bb.{{$i}}" checked="unchecked"></td>
                    </tr>
                   @endfor
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button wire:click.prevent="createinvoice" class="btn form-control btn-primary">Simpan</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

</div>
