@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Laporan Pegawai</h4>
                        <a href="{{ url('/cetak/pegawai') }}" class="btn btn-primary" target="_blank">Cetak</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jumlah Pelayanan</th>
                                    <th class="text-center">Jumlah Peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($pegawai))
                                    @foreach ($pegawai as $i => $item)
                                        <tr>
                                            <td class="text-center">{{ $i + 1 }}</td>
                                            <td class="text-center">{{ $item->nama }}</td>
                                            <td class="text-center">{{ $item->dokumenAgunan->count() }}</td>
                                            <td class="text-center">{{ $item->dokumenAgunanPeminjaman->count() }}</td>
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
@endsection
