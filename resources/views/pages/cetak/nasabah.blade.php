<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('pages.cetak.header')
    <hr>
    <h3 class="text-center">Laporan Nasabah</h3>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nomor Rekening</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if (count($nasabah))
                @foreach ($nasabah as $i => $item)
                    <tr>
                        <td class="align-middle text-center">{{ $i + 1 }}</td>
                        <td class="align-middle text-center">{{ $item->nama }}</td>
                        <td class="align-middle text-center">{{ $item->dokumenAgunan->count() }}</td>
                        <td class="align-middle text-center">{{ $item->dokumenAgunanPeminjaman->count() }}</td>
                    </tr>
                @endforeach
            @endif --}}
        </tbody>
    </table>
</body>

</html>
