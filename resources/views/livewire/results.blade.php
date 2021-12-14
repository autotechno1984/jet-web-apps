<div>
    <div class="row">
        <div class="col-lg-4">
            <div>

            </div>
            <form wire:submit.prevent="submit">
               @include('flash-message')

                <div class="card">
                <div class="card-header">
                    Buka Pasaran Togel Baru :
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <select wire:model="pasaran" name="pasaran" id="pasaran" class="form-select">
                                <option selected>Pilih Pasaran</option>

                                @foreach($markets as $market)
                                    <option value="{{ $market->id }}">{{ $market->nama }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary form-control">Periode Baru</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>


        </div>

        <div class="col-lg-8">

            <table class="table table-bordered text-center">
                <thead style="background: #718096; color:white;">
                    <tr>
                        <th>Pasaran</th>
                        <th>Kode</th>
                        <th>Periode</th>
                        <th>Jam - Tutup</th>
                        <th>Jam - Buka</th>
                        <th>1st Prize</th>
                        <th>Status</th>
                        <th>Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($resulttable as $data)
                        <tr>
                            <td>{{ $data->pasaran  }}</td>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->periode }}</td>
                            <td>{{ $data->jam_tutup }}</td>
                            <td>{{  $data->jambuka }}</td>
                            <td>{{ $data->hasil }}</td>
                            <td>{{ $data->status }}</td>
                            @if($data->tipe === 'H')
                                <td><a href="#">Detail</a></td>
                            @else
                                <td>No-Detail</td>
                            @endif
                            @if($data->status == 0 )
                            <td>Tutup</td>
                            @elseif($data->status == 2)
                            <td>Proses</td>
                            @else
                            <td>
                                <form wire:submit.prevent="tutup({{ $data->id }})">
                                <button class="form-control btn-danger" style="padding:0;"><i class="fas fa-power-off"></i>
                                </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Belum Ada Pasaran</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{ $resulttable->links() }}
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-lg-4">

        </div>
    </div>

</div>
