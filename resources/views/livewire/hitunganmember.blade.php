<div>
    <div class="row">
       <div class="col-2">
           <div class="input-group">
               <input class="form-control" type="text" placeholder="Cari Username" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
               <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>

           </div>

       </div>
    </div>
    <?php $no=1; ?>
    <div class="row mt-2">
        <div class="col-8">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Win-Lose</th>
                        <th>Detail</th>
                        <th>Bayar</th>
                        <th>Terima</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksidepowd as $data )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $profile->where('id', $data->user_id)->pluck('username')->first() }}</td>
                            <td style="color: {{ ($profile->where('id', $data->user_id)->pluck('profile.kredit')->first() - $data->total) > 0 ? 'blue' :'red' }}">{{ number_format($profile->where('id', $data->user_id)->pluck('profile.kredit')->first() - $data->total) }}</td>
                            <td><a href="{{ route('admin.tagihanmemberdetail', $data->user_id) }}" class="form-control btn btn-dark" >Detail</a></td>
                            <td><a href="#" wire:click.prevent="bayar({{$data->user_id}})" class="form-control {{ $profile->where('id', $data->user_id)->pluck('profile.kredit')->first() - $data->total > 0 ? 'btn btn-danger' : '' }}" {{ $profile->where('id', $data->user_id)->pluck('profile.kredit')->first() - $data->total > 0 ? '' : 'disabled' }} >Bayar</a></td>
                            <td><a href="#" class="form-control {{ $profile->where('id', $data->user_id)->pluck('profile.kredit')->first() - $data->total < 0 ? 'btn btn-primary' : '' }}" {{ $profile->where('id', $data->user_id)->pluck('profile.kredit')->first() - $data->total < 0 ? '' : 'disabled' }}>Terima</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>

                        <td colspan="3"><span>{{ $profile->sum('profile.kredit') - $transaksidepowd->sum('total') > 0 ? 'Kalah : ' : 'Menang : ' }}</span>{{ $profile->sum('profile.kredit') - $transaksidepowd->sum('total') > 0 ? number_format(($profile->sum('profile.kredit') - $transaksidepowd->sum('total')) *-1) : $profile->sum('profile.kredit') - $transaksidepowd->sum('total') }}</td>
                        <td colspan="3"></td>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
