@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Laporan Letak Dokumen Agunan</h4>
                        <a href="{{ url('/cetak/letak-dokumen-agunan') }}" class="btn btn-primary" target="_blank">Cetak</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Cif</th>
                                    <th class="text-center">Jenis Dokumen</th>
                                    <th class="text-center">Jenis Kredit</th>
                                    <th class="text-center">Lokasi Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($dokumenAgunan))
                                    @foreach ($dokumenAgunan as $i => $item)
                                        <tr>
                                            <td class="text-center">{{ $i + 1 }}</td>
                                            <td class="text-center">{{ $item->cif }}</td>
                                            <td class="text-center">{{ $item->jenis_agunan }}</td>
                                            <td class="text-center">{{ $item->jenis_kredit }}</td>
                                            <td class="text-center">
                                                {{ $item->lemariDetail->lemari->nama }} -> {{ $item->lemariDetail->nomor }}
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
@endsection
