@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Detail Dokumen Agunan</h4>
                        <a href="{{ route('dokumen-agunan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            value="{{ $dokumenAgunan->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nasabah" class="form-label">Nasabah</label>
                        <input type="text" class="form-control" id="nasabah" name="nasabah" required
                            value="{{ $dokumenAgunan->nasabah->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="pegawai" class="form-label">Pegawai Penerima Dokumen</label>
                        <input type="text" class="form-control" id="pegawai" name="pegawai" required
                            value="{{ $dokumenAgunan->pegawai->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi Penyimpanan</label>
                        <input type="text" class="form-control" required
                            value="{{ $dokumenAgunan->lemariDetail->lemari->nama . ' -> ' . $dokumenAgunan->lemariDetail->nomor }}"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" required value="{{ $dokumenAgunan->status }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Akad</label>
                        <input type="text" class="form-control" required value="{{ $dokumenAgunan->tanggal_akad_formatted }}"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Berlaku Sampai</label>
                        <input type="text" class="form-control" required value="{{ $dokumenAgunan->berlaku_sampai_formatted }}"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required disabled>{{ $dokumenAgunan->keterangan }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
