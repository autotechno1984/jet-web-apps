<div>
    <div class="row">
        <div class="col-1">
            <a href="{{ url()->previous() }}" class="btn btn-info">BACK</a>
        </div>
    </div>
    <?php $no=1; $noo=1 ; ?>
    <div class="row mt-1">

        <div class="col-4">
            <h3>Kredit :</h3>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>amount</th>
                        <th>Tgl</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($givekredit->where('user_id', $userid) as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td style="color: {{ $data->amount > 0 ? 'blue' : 'red' }}">{{ number_format($data->amount) }}</td>
                            <td>{{ date('d-m-Y', strtotime($data->date_approved, 2)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $givekredit->links() }}
        </div>

        <div class="col-4">
            <h3>Invoices :</h3>
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>No.Inv</th>
                    <th>Win-Lose</th>
                    <th>Tgl</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices->where('user_id', $userid) as $data)
                    <tr>
                        <td>{{ $noo++ }}</td>
                        <td>{{ $data->id }}</td>
                        <td style="color: {{ $data->winLose > 0 ? 'blue' : 'red' }}">{{ number_format($data->winLose) }}</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_invoice, 2)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$invoices}}
        </div>
    </div>
</div>
