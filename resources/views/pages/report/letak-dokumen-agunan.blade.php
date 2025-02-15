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
                                    <th class="text-center">Nama Dokumen</th>
                                    <th class="text-center">Lokasi Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($dokumenAgunan))
                                    @foreach ($dokumenAgunan as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
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
