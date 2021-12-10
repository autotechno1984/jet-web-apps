<div>
   <div class="row">
       <div class="col-lg-3">
           <form wire:submit.prevent="updatehasil">
                <div class="card">
               <div class="card-header">
                   Input Hasil Togel
               </div>
               <div class="card-body">
                   <div class="form-floating">
                       <select wire:model="resultid" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                           <option selected>Pilih Pasaran Yang Berjalan</option>
                            @forelse($result as $data)
                               <option value="{{ $data->id }}">{{ $data->pasaran }}</option>
                                @empty
                               <option value="#">Tidak ada pasaran</option>
                            @endforelse
                       </select>
                       <label for="floatingSelect">Pilih Pasaran Yang berjalan</label>
                   </div>
                   <div class="form-floating mb-3 mt-1">
                       <input wire:model="nomor" type="text" class="form-control" id="floatingInput" placeholder="No Togel" maxlength="4">
                       <label for="floatingInput">Nomor Togel</label>
                   </div>
                   <div class="col-lg-12">
                       <button class="form-control btn-primary">Simpan Data</button>
                   </div>
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-5">
           <form wire:submit.prevent="caridata">
           <div class="row">
               <div class="col-lg-8">
                   <div class="form-floating">
                       <select wire:model="search" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                           <option selected>Cari berdasarkan pasaran</option>
                           @forelse($pasaran->unique('pasaran') as $data)
                               <option value="{{ $data->pasaran }}">{{ $data->pasaran }}</option>
                           @empty
                               <option value="#">Tidak ada pasaran</option>
                           @endforelse
                       </select>
                       <label for="floatingSelect">Cari pasaran</label>
                   </div>
               </div>

           </div>
           <table class="table table-bordered table-striped text-center mt-1">
               <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Periode</th>
                    <th>Pasaran</th>
                    <th>Nomor</th>
                </tr>
               </thead>
                <tbody>
                    @forelse($togel as $data)
                        <tr>
                            <td>{{ date('y-m-d',strtotime($data->tgl_periode)) }}</td>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->pasaran }}</td>
                            <td>{{ ($data->tabelhasil->pluck('hasil')->first()) ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No data</td>
                        </tr>
                    @endforelse
                </tbody>

           </table>
           <div>
               {{ $togel->links() }}
           </div>
           </form>
       </div>

   </div>
</div>
