<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Print PDF</title>

    <style>
        .table-striped{
            table-layout: fixed;
            text-align: center;
            width: 100%;
        }
        thead{
            text-align: center;
            border-bottom:1px solid black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
<?php $no=1;?>
    <div class="container">
        <div class="bg-light">
            <p>Pasaran : {{ $data->pasaran }}</p>
            <p>Periode : {{ $data->id }}</p>
            <p>Tanggal : {{ date('d-m-Y', strtotime($data->tgl_periode)) }}</p>
        </div>

        <div>
            <table class="table table-bordered" style="font-size:13px;">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Inv.ID</th>
                    <th>Username</th>
                    <th>Kode</th>
                    <th>Posisi</th>
                    <th>Data</th>
                    <th>Amount</th>
                    <th>Tgl_beli</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invdetail as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->invoice_id }}</td>
                        <td>{{ $user->where('id', $item->user_id)->pluck('username')->first() }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->posisi }}</td>
                        <td>{{ $item->data }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->tgl_beli }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
