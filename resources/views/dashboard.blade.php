@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-account-box-multiple text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Nasabah</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $totalNasabah }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Lemari</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $totalLemari }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Dokumen Agunan</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $totalDokumenAgunan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Pegawai</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $totalPegawai }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jatuh Tempo Dokumen Agunan</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Cif</th>
                                    <th class="text-center">Nama Nasabah</th>
                                    <th class="text-center">Pegawai Penerima Dokumen</th>
                                    <th class="text-center">Jatuh Tempo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokumenAgunan as $item)
                                    <tr>
                                        <td class="font-weight-medium">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item['cif'] }}</td>
                                        <td>{{ $item['nasabah'] }}</td>
                                        <td>{{ $item['pegawai'] }}</td>
                                        <td class="text-center">{{ $item['berlaku_sampai'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
