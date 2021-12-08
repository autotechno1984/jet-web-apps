<div>
    <form wire:submit.prevent="savehasil">
    <div class="row">
        <div class="col-lg-3">
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

        <div class="col-lg-3">
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
                            <label for="" class="col-form-label">Consol - 2</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol3" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 3</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol4" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 4</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol5" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 5</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol6" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 6</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol7" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 7</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol8" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 8</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="consol9" type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Consol - 9</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">

        </div>

    </div>
    </form>
</div>
