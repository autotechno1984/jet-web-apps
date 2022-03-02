<div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Create Data Admin
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addadmin">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nama" class="col-form-label">nama</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="nama" type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="username" class="col-form-label">username</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" wire:model="username" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="password" class="col-form-label">Password</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="password" wire:model="password" class="form-control" name="password" id="username" placeholder="Password">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="handphone" class="col-form-label">Handphone</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" wire:model="handphone" class="form-control" name="handphone" id="username" placeholder="Handphone">
                        </div>
                    </div>
                        <div class="row mt-1">
                            <div class="col-lg-6">
                                <label for="level" class="col-form-label">level</label>
                            </div>
                            <div class="col-lg-6">
                                <select wire:model="level" id="" class="form-select">
                                    <option>Silahkan Dipilih Salah Satu</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Cs</option>
                                    <option value="3">Sortir</option>
                                </select>
                            </div>
                        </div>
                    <div class="row mt-1">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <button class="btn-primary form-control">Simpan Data</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="card mt-1">
                <div class="card-header bg-danger text-white">
                    Ganti Password Admin :
                </div>
                <form wire:submit.prevent="gantipassword">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" wire:model="usernamecheck" class="form-control" name="usernamecheck" id="usernamecheck" placeholder="Username">
                                    <span style="font-size:0.7rem; font-weight: bold;">{{ $messageusernotexist }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <input type="password" wire:model="passwordbaru" class="form-control" name="passwordbaru" id="passwordbaru" placeholder="Password Baru" maxlength="12">
                                </div>
                                <div class="col-lg-4">
                                    <button class="btn-danger form-control">Ubah Password</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    Whitelist IP Admin :
                </div>

                <div class="card-body">

                    <form wire:submit.prevent="whitleslistip">
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="Nama" class="col-form-label">Nama IP</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="namaip" type="text" class="form-control" name="namaip" id="namaip">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <label for="Ip-address" class="col-form-label">IP address</label>
                        </div>
                        <div class="col-lg-6">
                            <input wire:model="ipaddress" type="text" class="form-control" name="ipaddress" id="ipaddress" placeholder="192.168.0.1 / Contoh">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">
                            <button class="form-control btn-primary">Save Data</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-lg-6">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Handphone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admin as $data)
                        <tr>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->handphone }}</td>
                            <td>{{ ($data->bann == 1) ? 'AKTIF' : 'TDK AKTIF' }}</td>
                             <td>
                                 <a href="#" wire:click.prevent="updatestatus({{ $data->id }})"  class="btn {{ ($data->bann == 1) ? 'btn-danger' : 'btn-warning' }}"> {{ ($data->bann == 1) ? 'OFF' : 'ON' }}</a></td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Ip - Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($whiteip as $data)
                        <tr>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->whiteip }}</td>
                            <td><a style="box-shadow: none; border:1px solid white;" wire:click.prevent="deleteip({{ $data->id }})" class="btn"><i class="fa-solid fa-trash-can" style="color:red;"></i></a></td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
