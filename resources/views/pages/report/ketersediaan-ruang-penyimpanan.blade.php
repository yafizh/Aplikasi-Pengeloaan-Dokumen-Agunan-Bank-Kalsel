@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Laporan Ketersediaan Ruang Penyimpanan Dokumen Agunan</h4>
                        <a href="{{ url('/cetak/ketersediaan-ruang-penyimpanan') }}" class="btn btn-primary"
                            target="_blank">Cetak</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Lemari</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($lemari))
                                    @foreach ($lemari as $i => $item)
                                        @foreach ($item->details as $j => $detail)
                                            <tr>
                                                <td class="text-center">{{ $i + $j + 1 }}</td>
                                                <td class="text-center">{{ $item->nama }} -> {{ $detail->nomor }}</td>
                                                <td class="text-center">{{ $detail->status }}</td>
                                            </tr>
                                        @endforeach
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
