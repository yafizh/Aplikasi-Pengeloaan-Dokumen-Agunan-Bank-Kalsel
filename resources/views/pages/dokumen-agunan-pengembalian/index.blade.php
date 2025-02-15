@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            @session('message')
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endsession
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Pengembalian Dokumen Agunan</h4>
                        <a href="{{ route('dokumen-agunan-pengembalian.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Dokumen</th>
                                    <th class="text-center">Pegawai Peminjam</th>
                                    <th class="text-center">Tanggal Pinjam</th>
                                    <th class="text-center">Tanggal Pengembalian</th>
                                    <th class="text-center" style="width: 1%;white-space: nowrap;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($dokumenAgunanPengembalian))
                                    @foreach ($dokumenAgunanPengembalian as $item)
                                        <tr>
                                            <td>{{ $item->peminjaman->dokumenAgunan->nama }}</td>
                                            <td>{{ $item->peminjaman->pegawai->nama }}</td>
                                            <td class="text-center">{{ $item->tanggal_peminjaman_formatted }}</td>
                                            <td class="text-center">{{ $item->tanggal_pengembalian_formatted }}</td>
                                            <td class="d-flex" style="gap: .6rem;">
                                                <a href="{{ route('dokumen-agunan-pengembalian.edit', $item->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('dokumen-agunan-pengembalian.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin?')">Hapus</button>
                                                </form>
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
