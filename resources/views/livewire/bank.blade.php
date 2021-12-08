<div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Kategori Bank
                </div>
                <form wire:submit.prevent="kategori">
                <div class="card-body">
                      <div class="row">
                          <div class="col-lg-6">
                              <label for="" class="col-form-label">Kategori</label>
                          </div>
                          <div class="col-lg-6">
                              <input type="text" wire:model="kategori" class="form-control" name="kategori" id="kategori" placeholder="kategori">
                          </div>
                      </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="" class="col-form-label">Bank</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" wire:model="kategoribank" class="form-control" name="bank" id="bank" placeholder="bank">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <button class="btn-primary form-control">Save Data</button>
                            </div>
                        </div>

                </div>
                </form>
            </div>
            <div class="row mt-1">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Bank</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($banks as $data)
                                <tr>
                                    <td>{{ $data->kategori }}</td>
                                    <td>{{ $data->nama }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No Data</td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Data Bank
                </div>
                <form wire:submit.prevent="savebank">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Kategori</label>
                        </div>
                        <div class="col-lg-6">
                            <select wire:model="listkategori" name="kategori" id="" class="form-select">
                                <option selected>Pilih Bank</option>
                                @forelse($banks as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori }} - {{ $data->nama }}</option>
                                    @empty
                                    <option value="#">Blm Ada data Bank</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Nomor Rekening</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" wire:model="nomorrekening" name="nomorekening" class="form-control" id="nomorrekening" placeholder="Nomor Rekening">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="" class="col-form-label">Nama Rekening</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" wire:model="namarekening" name="namarekening" id="namarekening" class="form-control" placeholder="namarekening">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <button class="btn-primary form-control">Save Data</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div class="row mt-1">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>Bank</th>
                            <th>No-Rekening</th>
                            <th>Nama-Rekening</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($bankdetail as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nomor_akun }}</td>
                                    <td>{{ $data->nama_bank }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>Edit</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
