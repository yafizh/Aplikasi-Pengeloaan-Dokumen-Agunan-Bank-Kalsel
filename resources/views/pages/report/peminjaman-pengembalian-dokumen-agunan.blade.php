@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 card-title>Laporan Peminjaman dan Pengembalian Dokumen Agunan</h4>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Dokumen</th>
                                    <th class="text-center">Pegawai yang Meminjam</th>
                                    <th class="text-center">Tanggal Peminjaman</th>
                                    <th class="text-center">Tanggal Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($dokumenAgunanPeminjaman))
                                    @foreach ($dokumenAgunanPeminjaman as $item)
                                        <tr>
                                            <td>{{ $item->dokumenAgunan->nama }}</td>
                                            <td>{{ $item->pegawai->nama }}</td>
                                            <td class="text-center">{{ $item->tanggal_peminjaman }}</td>
                                            <td class="text-center">
                                                {{ $item->pengembalian->tanggal_pengembalian ?? 'Belum Dikembalikan' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example', {
            language: {
                emptyTable: 'Data Tidak Ada'
            }
        });
    </script>
@endsection
