@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <form>
                    <div class="card-body d-flex justify-content-between align-items-end" style="gap: 1rem;">
                        <div class="d-flex" style="gap: 1rem;">
                            <div>
                                <label for="dari_tanggal_peminjaman" class="form-label">Dari Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="dari_tanggal_peminjaman"
                                    name="dari_tanggal_peminjaman" required
                                    value="{{ request()->get('dari_tanggal_peminjaman') }}" required>
                            </div>
                            <div>
                                <label for="sampai_tanggal_peminjaman" class="form-label">Sampai Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="sampai_tanggal_peminjaman"
                                    name="sampai_tanggal_peminjaman" required
                                    value="{{ request()->get('sampai_tanggal_peminjaman') }}" required>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Filter</button>
                            <a href="{{ url($urlCetak) }}" class="btn btn-primary" target="_blank">Cetak</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Laporan Peminjaman dan Pengembalian Dokumen Agunan</h4>
                        <a href="{{ url('/cetak/peminjaman-pengembalian') }}" class="btn btn-primary"
                            target="_blank">Cetak</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
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
                                            <td class="text-center">{{ $i + 1 }}</td>
                                            <td class="text-center">{{ $item->dokumenAgunan->nasabah_nama }}</td>
                                            <td class="text-center">{{ $item->pegawai->nama }}</td>
                                            <td class="text-center">{{ $item->tanggal_peminjaman_formatted }}</td>
                                            <td class="text-center">
                                                {{ $item->tanggal_pengembalian_formatted ?? 'Belum Dikembalikan' }}
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
