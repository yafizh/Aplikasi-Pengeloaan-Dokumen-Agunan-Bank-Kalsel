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
    <h3 class="text-center">Laporan Peminjaman dan Pengembalian Dokumen Agunan</h3>
    @if ($filter['dari_tanggal_peminjaman'] && $filter['sampai_tanggal_peminjaman'])
        <h5 class="mb-0">Filter</h5>
        <table>
            <tr>
                <td>Dari Tanggal Peminjaman</td>
                <td>: {{ $filter['dari_tanggal_peminjaman'] }}</td>
            </tr>
            <tr>
                <td>Sampai Tanggal Peminjaman</td>
                <td>: {{ $filter['sampai_tanggal_peminjaman'] }}</td>
            </tr>
        </table>
    @endif
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Dokumen Nasabah Yang Dipinjam</th>
                <th class="text-center">Pegawai yang Meminjam</th>
                <th class="text-center">Tanggal Peminjaman</th>
                <th class="text-center">Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @if (count($dokumenAgunanPeminjaman))
                @foreach ($dokumenAgunanPeminjaman as $i => $item)
                    <tr>
                        <td class="align-middle text-center">{{ $i + 1 }}</td>
                        <td class="align-middle">{{ $item->dokumenAgunan->nasabah_nama }}</td>
                        <td class="align-middle">{{ $item->pegawai->nama }}</td>
                        <td class="align-middle text-center">{{ $item->tanggal_peminjaman_formatted }}</td>
                        <td class="align-middle text-center">
                            {{ $item->tanggal_pengembalian_formatted ?? 'Belum Dikembalikan' }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
