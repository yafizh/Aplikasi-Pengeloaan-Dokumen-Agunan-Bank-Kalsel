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
    <h3 class="text-center">Laporan Masa Berlaku Dokumen Agunan</h3>
    @if ($filter['dari_berlaku_sampai'] && $filter['sampai_berlaku_sampai'])
        <h5 class="mb-0">Filter</h5>
        <table>
            <tr>
                <td>Dari Berlaku Sampai</td>
                <td>: {{ $filter['dari_berlaku_sampai'] }}</td>
            </tr>
            <tr>
                <td>Sampai Berlaku Sampai</td>
                <td>: {{ $filter['sampai_berlaku_sampai'] }}</td>
            </tr>
        </table>
    @endif
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Cif</th>
                <th class="text-center">Nama Nasabah</th>
                <th class="text-center">Nomor Rekening</th>
                <th class="text-center">Berlaku Sampai</th>
            </tr>
        </thead>
        <tbody>
            @if (count($dokumenAgunan))
                @foreach ($dokumenAgunan as $item)
                    <tr>
                        <td class="align-middle text-center">{{ $item->cif }}</td>
                        <td class="align-middle">{{ $item->nasabah_nama }}</td>
                        <td class="align-middle text-center">{{ $item->nasabah_nomor_rekening }}</td>
                        <td class="align-middle text-center">{{ $item->berlaku_sampai_formatted }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
