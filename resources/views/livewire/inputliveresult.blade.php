<div>
   <div class="row">
       <div class="col-lg-2">
           <div class="form-floating">
               <select wire:model="pasaran" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                   <option value="0" selected>Pilih Pasaran Yang akan Diupdate</option>
                    @forelse($result as $data)
                       <option value="{{ $data->id }}">{{ $data->pasaran }}</option>
                        @empty
                       <option value="#">Tidak ada pasaran</option>
                   @endforelse
               </select>
               <label for="floatingSelect">pilih Pasaran</label>
           </div>
       </div>
       <div class="col-lg-1">
           @if($pasaran != 0)
           <div class="row">
               <form wire:submit.prevent="liveresult">
               <button class="btn-lg btn-danger">Live</button>
               </form>

           </div>
           @endif
       </div>
       <div class="col-lg-2">
           <button class="btn-lg btn-info" style="font-weight: bold;">Status : <span style="color:gold;">{{ $status }}</span></button>
       </div>
   </div>
    <form wire:submit.prevent="updateresult">
    <div class="row mt-2">
        <div class="col-lg-3">
            <div class="form-floating">
                <select wire:model="kode" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Pilih Hadiah</option>
                    <option value="sh15">consol-9</option>
                    <option value="sh14">consol-8</option>
                    <option value="sh13">consol-7</option>
                    <option value="sh12">consol-6</option>
                    <option value="sh11">consol-5</option>
                    <option value="sh10">consol-4</option>
                    <option value="sh9">consol-3</option>
                    <option value="sh8">consol-2</option>
                    <option value="sh7">consol-1</option>
                    <option value="sh6">starter-3</option>
                    <option value="sh5">starter-2</option>
                    <option value="sh4">starter-1</option>
                    <option value="sh3">utama-3</option>
                    <option value="sh2">utama-2</option>
                    <option value="sh1">utama-1</option>
                </select>
                <label for="floatingSelect">Pilih Hadiah</label>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3">
            <div class="form-floating mb-3">
                <input wire:model="updatehasil" type="text" class="form-control" id="floatingInput" maxlength="4">
                <label for="floatingInput">Input Hasil</label>
            </div>
        </div>
    </div>
    <div class="row mt-2">
       <div class="col-lg-3">
           <button class="form-control btn-outline-primary">Update</button>
       </div>
     </div>

    </form>
    <div class="row mt-2">
        <div class="col-lg-3">

            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th colspan="3">Consolation</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dataresult as $data)
                    <tr>
                        <td>{{"9. ". $data->sh15 }}</td>
                        <td>{{"8. ". $data->sh14 }}</td>
                        <td>{{"7. ". $data->sh13 }}</td>
                    </tr>
                    <tr>
                        <td>{{"6. ". $data->sh12 }}</td>
                        <td>{{"5. ". $data->sh11 }}</td>
                        <td>{{"4. ". $data->sh10 }}</td>
                    </tr>
                    <tr>
                        <td>{{"3. ". $data->sh9 }}</td>
                        <td>{{"2. ". $data->sh8 }}</td>
                        <td>{{"1. ". $data->sh7 }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th colspan="3">Starter prize</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataresult as $data)
                <tr>
                    <td>{{"3. ". $data->sh6 }}</td>
                    <td>{{"2. ". $data->sh5 }}</td>
                    <td>{{"1. ". $data->sh4 }}</td>
                </tr>
                @endforeach
                </tbody>

            </table>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th colspan="2">Hadiah Utama</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataresult as $data)
                <tr>
                    <td>{{"3. ". $data->sh3 }}</td>
                    <td>{{"2. ". $data->sh2 }}</td>
                    <td>{{"1. ". $data->sh1 }}</td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
