<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid black;
        }

        td,
        th {
            padding: 10px
        }

        th {
            background-color: rgb(183, 183, 243)
        }
    </style>
</head>

<body>
    <h1>Data Produk UMKM Di Bone Bolango</h1>

    <table class="table table-bordered mt-5">
        <tr>
            <th>No</th>
            <th>Nama Owner</th>
            <th>Nama Produk</th>
            <th>Kategori Produk</th>
            <th>Harga</th>
        </tr>
        @foreach ($product as $p)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category->name }}</td>
                <td>{{ $p->price }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
