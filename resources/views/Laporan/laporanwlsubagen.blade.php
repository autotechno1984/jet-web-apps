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
        <h3 class="text-center text-decoration-underline">Lap. Win - Lose Grand Shanghai : {{ date('d-m-Y', strtotime($date)) }}</h3>

        @foreach($pasaran->whereIn('id', $result) as $data)
            <div class="mt-1" >

                <div class="row" style="background: grey; font-weight: bold; padding:2px;" >
                    <div class="col-1">Pasaran</div>
                    <div class="col-4">: {{ $data->pasaran }}</div>
                    <div class="col-5"></div>
                    <div class="col-1">Periode</div>
                    <div class="col-1">: {{ $data->id }}</div>
                </div>

                <div class="row mt-1">
                    @forelse($invoice as $inv)
                            {{ $user->where('id', $inv->user_id)->pluck('name') }}
                            {{ $inv->where('result_id', $data->id)->pluck('user_id') }}
                        @empty
                        <h5 class="text-center">no data</h5>
                    @endforelse
                </div>

            </div>

        @endforeach

        <br>


    </div>
</body>
</html>
