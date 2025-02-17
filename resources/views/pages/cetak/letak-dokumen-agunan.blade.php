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
    <h3 class="text-center">Laporan Letak Dokumen Agunan</h3>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Cif</th>
                <th class="text-center">Jenis Kredit</th>
                <th class="text-center">Jenis Agunan</th>
                <th class="text-center">Lokasi Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @if (count($dokumenAgunan))
                @foreach ($dokumenAgunan as $item)
                    <tr>
                        <td class="align-middle text-center">{{ $item->cif }}</td>
                        <td class="align-middle text-center">{{ $item->jenis_agunan }}</td>
                        <td class="align-middle text-center">{{ $item->jenis_kredit }}</td>
                        <td class="align-middle text-center">
                            {{ $item->lemariDetail->lemari->nama }} -> {{ $item->lemariDetail->nomor }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
