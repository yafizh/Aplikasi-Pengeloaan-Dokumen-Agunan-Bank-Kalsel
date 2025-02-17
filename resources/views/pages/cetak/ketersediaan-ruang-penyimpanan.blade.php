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
    <h3 class="text-center">Laporan Ketersediaan Ruang Penyimpanan Dokumen Agunan</h3>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Lemari</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @if (count($lemari))
                @foreach ($lemari as $i => $item)
                    @foreach ($item->details as $j => $detail)
                        <tr>
                            <td class="align-middle text-center">{{ $i + $j + 1 }}</td>
                            <td class="align-middle text-center">{{ $item->nama }} -> {{ $detail->nomor }}</td>
                            <td class="align-middle text-center">{{ $detail->status }}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
