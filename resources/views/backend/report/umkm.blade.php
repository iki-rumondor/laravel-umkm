<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        table, tr, td, th {
            border: 1px solid black;
        }

        td,th{
            padding: 10px
        }

        th{
            background-color: rgb(183, 183, 243)
        }
    </style>
</head>

<body>
    <h1>Data Seluruh UMKM Di Bone Bolango</h1>

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Owner</th>
                <th>Nama Toko</th>
                <th>Jenis UMKM</th>
                <th>Alamat</th>
                <th>Tahun Berdiri</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($umkm as $u)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $u->user->name }}</td>
                    <td>{{ $u->nama_toko }}</td>
                    <td>{{ $u->jenis->name }}</td>
                    <td>{{ $u->alamat }}</td>
                    <td>{{ $u->tahun_berdiri }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
