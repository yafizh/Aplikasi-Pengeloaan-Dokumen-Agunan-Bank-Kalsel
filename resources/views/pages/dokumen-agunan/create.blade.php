@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Tambah Dokumen Agunan</h4>
                        <a href="{{ route('dokumen-agunan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <form action="{{ route('dokumen-agunan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cif" class="form-label">Cif</label>
                            <input type="text" class="form-control" id="cif" name="cif" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Jenis Kredit</label>
                            <div class="d-flex" style="gap: 1rem;">
                                <div>
                                    <input type="radio" id="KreditMultiguna" value="Kredit Multiguna" name="jenis_kredit">
                                    <label for="KreditMultiguna">
                                        Kredit Multiguna
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="KPR" value="KPR" name="jenis_kredit">
                                    <label for="KPR">
                                        KPR
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="ModalKerja" value="Modal Kerja" name="jenis_kredit">
                                    <label for="ModalKerja">
                                        Modal Kerja
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Jenis Agunan</label>
                            <div class="d-flex" style="gap: 1rem;">
                                <div>
                                    <input type="radio" id="SHM" value="SHM" name="jenis_agunan">
                                    <label for="SHM">
                                        SHM
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="SK" value="SK" name="jenis_agunan">
                                    <label for="SK">
                                        SK
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="BPKB" value="BPKB" name="jenis_agunan">
                                    <label for="BPKB">
                                        BPKB
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nasabah_nama" class="form-label">Nama Nasabah Pemilik Agunan</label>
                            <input type="text" class="form-control" id="nasabah_nama" name="nasabah_nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nasabah_nomor_rekening" class="form-label">Nomor Rekening Nasabah Pemilik
                                Agunan</label>
                            <input type="text" class="form-control" id="nasabah_nomor_rekening"
                                name="nasabah_nomor_rekening" required>
                        </div>
                        <div class="mb-3">
                            <label for="pegawai_id" class="form-label">Pegawai Penerima Dokumen</label>
                            <select name="pegawai_id" id="pegawai_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Pegawai</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lemari_detail_id" class="form-label">Lemari Penyimpanan</label>
                            <select name="lemari_detail_id" id="lemari_detail_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Lemari</option>
                                @foreach ($lemari as $item)
                                    <optgroup label="{{ $item->nama }}">
                                        @foreach ($item->details as $detail)
                                            <option value="{{ $detail->id }}">{{ $detail->nomor }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" selected disabled>Pilih Status Dokumen</option>
                                <option value="Terverifikasi">Terverifikasi</option>
                                <option value="Menunggu Terverifikasi">Menunggu Terverifikasi</option>
                                <option value="Belum Lengkap">Belum Lengkap</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akad" class="form-label">Tanggal Akad</label>
                            <input type="date" class="form-control" id="tanggal_akad" name="tanggal_akad" required>
                        </div>
                        <div class="mb-3">
                            <label for="berlaku_sampai" class="form-label">Berlaku Sampai</label>
                            <input type="date" class="form-control" id="berlaku_sampai" name="berlaku_sampai"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
