<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grand-Shanghai | Win-lose Sub Agen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
        <h3 class="text-center py-4">LAP. WIN - LOSE : {{ date('d-m-Y', strtotime($date)) }}</h3>
        @foreach($pasaran->whereIn('id', $result) as $data)
               <div class="mt-1">
                        <div class="row py-2" style="background: #F3E9DD; font-weight: bold; padding:2px; border-radius: 3px;" >
                            <div class="col-1">Pasaran</div>
                            <div class="col-4">: {{ $data->pasaran }}</div>
                            <div class="col-2">O Bersih : {{ $invoice->sum('total') }}</div>
                            <div class="col-3">TTL O : {{ $invoice->sum('amount') }}</div>
                            <div class="col-1">Periode</div>
                            <div class="col-1">: {{ $data->id }}</div>
                        </div>

                   @forelse($userupline as $upline)

                            @if(count($invoice->whereIn('user_id', $datauser->where('referallid', $upline->uplineid)->pluck('id'))) == 0 && count($invoice->whereIn('user_id',$datauser->where('uplineid', $upline->uplineid)->pluck('id'))) == 0)

                                @else
                           <div class="mt-2">
                               <div class="row py-2" style="border-radius:5px; background:#F4FCD9; font-weight: bold;">

                                   <div class="col-1">Agen</div>
                                   <div class="col-2">: {{ $datauser->where('referallid', $upline->uplineid)->pluck('username')->first() }}</div>
                                   <div class="col-1">Nama</div>
                                   <div class="col-2">{{ $datauser->where('referallid', $upline->uplineid)->pluck('name')->first() }}</div>
                                   <div class="col-1">Omset</div>
                                   <div class="col-1">{{ $groupwithcount->where('user_id', $upline->id)->pluck('amount')->first() ?? 0 }}</div>
                                   <div class="col-1">Omset B</div>
                                   <div class="col-1">{{ $groupwithcount->where('user_id', $upline->id)->pluck('total')->first() ?? 0}}</div>
                                   <div class="col-1">Win-Lose</div>
                                   <div class="col-1">{{ $groupwithcount->where('user_id', $upline->id)->pluck('winLose')->first() ?? 0 }}</div>
                               </div>
                               <div class="row mt-1">

                                   @if($invoiceDetails->where('user_id', $upline->id))

                                   @else
                                       <p>Kalah</p>
                                   @endif

                               </div>

                               <div class="row mt-1">
                                   <div class="col-1"></div>
                                   <div class="col-11 py-2" style="background:#B7CADB; border-radius:5px;">
                                       @foreach( $datauser->where('uplineid', $upline->uplineid) as $data)
                                           <div class="row mt-1">
                                               @if(count($groupwithcount->where('user_id', $data->id)) == 0)

                                               @else
                                                   <div class="col-2">S Agen : {{ $data->username }}</div>
                                                   <div class="col-2">Nama : {{ $data->name }}</div>
                                                   <div class="col-1">Omset</div>
                                                   <div class="col-1">{{ $groupwithcount->where('user_id', $data->id)->pluck('amount')->first() ?? 0 }}</div>
                                                   <div class="col-1">Omset B</div>
                                                   <div class="col-1">{{ $groupwithcount->where('user_id', $data->id)->pluck('total')->first() ?? 0}}</div>
                                                   <div class="col-1">Win-Lose</div>
                                                   <div class="col-1">{{ $groupwithcount->where('user_id', $data->id)->pluck('winLose')->first() ?? 0 }}</div>
                                                   @if( $groupwithcount->where('user_id', $data->id)->pluck('winLose')->first() > 0)
                                                       <div class="bg-light">
                                                           @foreach( $invoiceDetails->where('user_id', $data->id) as $data)
                                                               <div class="row my-2">
                                                                   <div class="col-2">Invoice : {{ $data->invoiceid }}</div>
                                                                   <div class="col-2">J-Hadiah : {{ $data->j_hadiah }} </div>
                                                                   <div class="col-2">Amount : {{ $data->amount }}</div>
                                                                   <div class="col-2">Nomor : {{ $data->data }}</div>
                                                               </div>
                                                           @endforeach
                                                       </div>
                                                   @else

                                                   @endif

                                               @endif
                                           </div>
                                       @endforeach


                                   </div>
                                   <div>
                                       <div class="row mt-1 py-2" style="background: #E6D5B8; border-radius: 5px;">
                                           <div class="col-2">Total Sub Agen : {{ count($datauser->where('uplineid', $upline->uplineid)) }}</div>
                                           <div class="col-2">Ttl Om agen : {{  $invoice->whereIn('user_id', $datauser->where('uplineid', $upline->uplineid)->pluck('id'))->sum('amount') }}</div>
                                           <div class="col-2">Ttl O.B Agen : {{ $invoice->whereIn('user_id', $datauser->where('uplineid', $upline->uplineid)->pluck('id'))->sum('total') }}</div>
                                           <div class="col-3">Ttl Win Lose : {{ $invoice->whereIn('user_id', $datauser->where('uplineid', $upline->uplineid)->pluck('id'))->sum('winLose') }} </div>
                                           <div class="col-3">Grand Total : {{ $invoice->whereIn('user_id', $datauser->where('uplineid', $upline->uplineid)->pluck('id'))->sum('winLose') + $invoice->whereIn('user_id', $datauser->where('referallid', $upline->uplineid)->pluck('id'))->sum('winLose')  }}</div>
                                       </div>
                                   </div>
                               </div>
                            @endif

                        @empty
                            <div>
                                <h5 class="text-center">No data</h5>
                            </div>
                   @endforelse
                                @foreach($agens as $agen)

                                   <div class="row mt-1 py-2" style="border-radius:5px; background:#F4FCD9; font-weight: bold;">

                                       <div class="col-1">Agen</div>
                                       <div class="col-2">: {{ $datauser->where('id', $agen->id)->pluck('username')->first() }}</div>
                                       <div class="col-1">Nama</div>
                                       <div class="col-2">{{ $datauser->where('id', $agen->id)->pluck('name')->first() }}</div>
                                       <div class="col-1">Omset</div>
                                       <div class="col-1">{{ $groupwithcount->where('user_id', $agen->id)->pluck('amount')->first() ?? 0 }}</div>
                                       <div class="col-1">Omset B</div>
                                       <div class="col-1">{{ $groupwithcount->where('user_id', $agen->id)->pluck('total')->first() ?? 0}}</div>
                                       <div class="col-1">Win-Lose</div>
                                       <div class="col-1">{{ $groupwithcount->where('user_id', $agen->id)->pluck('winLose')->first() ?? 0 }}</div>
                                   </div>
                                   @if( $groupwithcount->where('user_id', $data->id)->pluck('winLose')->first() > 0)
                                       <div class="bg-light">
                                           @foreach( $invoiceDetails->where('user_id', $data->id) as $data)

                                               <div class="row">
                                                   <div class="col-2">Invoice : {{ $data->invoiceid }}</div>
                                                   <div class="col-2">J-Hadiah : {{ $data->j_hadiah }} </div>
                                                   <div class="col-2">Amount : {{ $data->amount }}</div>
                                                   <div class="col-2">Nomor : {{ $data->data }}</div>
                                               </div>

                                           @endforeach
                                       </div>
                                   @else

                                   @endif
                               @endforeach
                                </div>
        @endforeach

    </div>
</body>
</html>
