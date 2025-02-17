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
    <h3 class="text-center">Laporan Daftar Dokumen Agunan</h3>
    @if ($filter['dari_tanggal_akad'] && $filter['sampai_tanggal_akad'])
        <h5 class="mb-0">Filter</h5>
        <table>
            <tr>
                <td>Dari Tanggal Akad</td>
                <td>: {{ $filter['dari_tanggal_akad'] }}</td>
            </tr>
            <tr>
                <td>Sampai Tanggal Akad</td>
                <td>: {{ $filter['sampai_tanggal_akad'] }}</td>
            </tr>
        </table>
    @endif
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Cif</th>
                <th class="text-center">Nama Nasabah</th>
                <th class="text-center">Nomor Rekening</th>
                <th class="text-center">Tanggal Akad</th>
                <th class="text-center">Jenis Agunan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumenAgunan as $i => $item)
                <tr>
                    <td class="align-middle text-center">{{ $i + 1 }}</td>
                    <td class="align-middle text-center">{{ $item->cif }}</td>
                    <td class="align-middle">{{ $item->nasabah_nama }}</td>
                    <td class="align-middle text-center">{{ $item->nasabah_nomor_rekening }}</td>
                    <td class="align-middle text-center">{{ $item->tanggal_akad_formatted }}</td>
                    <td class="align-middle text-center">{{ $item->jenis_agunan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
