@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <form action="/laporan/daftar-agunan">
                    <div class="card-body d-flex justify-content-between align-items-end" style="gap: 1rem;">
                        <div class="d-flex" style="gap: 1rem;">
                            <div>
                                <label for="dari_tanggal_akad" class="form-label">Dari Tanggal Akad</label>
                                <input type="date" class="form-control" id="dari_tanggal_akad" name="dari_tanggal_akad"
                                    required value="{{ request()->get('dari_tanggal_akad') }}" required>
                            </div>
                            <div>
                                <label for="sampai_tanggal_akad" class="form-label">Sampai Tanggal Akad</label>
                                <input type="date" class="form-control" id="sampai_tanggal_akad"
                                    name="sampai_tanggal_akad" required value="{{ request()->get('sampai_tanggal_akad') }}"
                                    required>
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
                        <h4>Laporan Daftar Dokumen Agunan</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
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
                                @if (count($dokumenAgunan))
                                    @foreach ($dokumenAgunan as $i => $item)
                                        <tr>
                                            <td class="text-center">{{ $i + 1 }}</td>
                                            <td class="text-center">{{ $item->cif }}</td>
                                            <td class="text-center">{{ $item->nasabah->nama }}</td>
                                            <td class="text-center">{{ $item->nasabah->nomor_rekening }}</td>
                                            <td class="text-center">{{ $item->tanggal_akad_formatted }}</td>
                                            <td class="text-center">{{ $item->jenis_agunan }}</td>
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
