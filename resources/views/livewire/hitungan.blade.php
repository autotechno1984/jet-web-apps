<div>
    <div class="row">
        <div class="col-lg-2">
            <div class="form-floating">
                <select wire:model="daftarperiode" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Pilih Periode</option>
                        @forelse($periode as $data)
                        <option value="{{ $data->id }}">{{ $data->pasaran }}</option>
                            @empty

                        @endforelse
                </select>
                <label for="floatingSelect">Pilih Periode</label>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-lg-5">
            <h4>Hitungan</h4>
            <div class="row">
                <div class="col-lg-4">
                    <label for="4D" class="col-form-label">4D</label>
                </div>
                <div class="col-lg-4">
                    <form wire:submit.prevent="empatd">
                        <button class="form-control btn-primary">4D-3D-2D</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">{{ $statusempatd }}</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">Colok - Bebas</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">Colok Bebas</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">Colok - Jitu</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">Colok Jitu</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">Colok - Naga</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">Colok Naga</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">Colok - Macau</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">Colok Macau</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">50-50</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">50UMUM</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">50Spesial</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">50-Spesial</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">50-Kombinasi</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">50-Kombinasi</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">Macau</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">Macau</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">Dasar</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">Dasar</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4">
                    <label for="clb" class="col-form-label">Shio</label>
                </div>
                <div class="col-lg-4">
                    <form>
                        <button class="form-control btn-primary">Shio</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-8">
                    <form wire:submit.prevent="closemarket">
                        <button class="form-control btn-primary">Tutup Pasaran</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <label for="status4d" class="col-form-label">Status</label>
                </div>
            </div>
        </div>
    </div>

</div>
