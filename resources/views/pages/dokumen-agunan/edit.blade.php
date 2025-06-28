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
                        <h4>Edit Dokumen Agunan</h4>
                        <a href="{{ route('dokumen-agunan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <form action="{{ route('dokumen-agunan.update', $dokumenAgunan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="cif" class="form-label">Cif</label>
                            <input type="text" class="form-control" id="cif" name="cif" required
                                value="{{ $dokumenAgunan->cif }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Jenis Kredit</label>
                            <div class="d-flex" style="gap: 1rem;">
                                <div>
                                    <input type="radio" id="KreditMultiguna" value="Kredit Multiguna" name="jenis_kredit"
                                        {{ $dokumenAgunan->jenis_kredit == 'Kredit Multiguna' ? 'checked' : '' }}>
                                    <label for="KreditMultiguna">
                                        Kredit Multiguna
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="KPR" value="KPR" name="jenis_kredit"
                                        {{ $dokumenAgunan->jenis_kredit == 'KPR' ? 'checked' : '' }}>
                                    <label for="KPR">
                                        KPR
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="ModalKerja" value="Modal Kerja" name="jenis_kredit"
                                        {{ $dokumenAgunan->jenis_kredit == 'Modal Kerja' ? 'checked' : '' }}>
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
                                    <input type="radio" id="SHM" value="SHM" name="jenis_agunan"
                                        {{ $dokumenAgunan->jenis_agunan == 'SHM' ? 'checked' : '' }}>
                                    <label for="SHM">
                                        SHM
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="SK" value="SK" name="jenis_agunan"
                                        {{ $dokumenAgunan->jenis_agunan == 'SK' ? 'checked' : '' }}>
                                    <label for="SK">
                                        SK
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="BPKB" value="BPKB" name="jenis_agunan"
                                        {{ $dokumenAgunan->jenis_agunan == 'BPKB' ? 'checked' : '' }}>
                                    <label for="BPKB">
                                        BPKB
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nasabah_id" class="form-label">Nasabah</label>
                            <select name="nasabah_id" id="nasabah_id" class="form-control" required>
                                @foreach ($nasabah as $item)
                                    <option {{ $item->id == $dokumenAgunan->nasabah->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pegawai_id" class="form-label">Pegawai Penerima Dokumen</label>
                            <select name="pegawai_id" id="pegawai_id" class="form-control" required>
                                @foreach ($pegawai as $item)
                                    <option {{ $item->id == $dokumenAgunan->pegawai->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lemari_detail_id" class="form-label">Lemari Penyimpanan</label>
                            <select name="lemari_detail_id" id="lemari_detail_id" class="form-control" required>
                                @foreach ($lemari as $item)
                                    <optgroup label="{{ $item->nama }}">
                                        @foreach ($item->details as $detail)
                                            <option {{ $detail->id == $dokumenAgunan->lemariDetail->id ? 'selected' : '' }}
                                                value="{{ $detail->id }}">{{ $detail->nomor }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" selected disabled>Pilih Status Dokumen</option>
                                <option {{ $dokumenAgunan->status === 'Terverifikasi' ? 'selected' : '' }}
                                    value="Terverifikasi">Terverifikasi</option>
                                <option {{ $dokumenAgunan->status === 'Menunggu Terverifikasi' ? 'selected' : '' }}
                                    value="Menunggu Terverifikasi">Menunggu Terverifikasi</option>
                                <option {{ $dokumenAgunan->status === 'Belum Lengkap' ? 'selected' : '' }}
                                    value="Belum Lengkap">Belum Lengkap</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akad" class="form-label">Tanggal Akad</label>
                            <input type="date" class="form-control" id="tanggal_akad" name="tanggal_akad" required
                                value="{{ $dokumenAgunan->tanggal_akad->format('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <label for="berlaku_sampai" class="form-label">Jatuh Tempo</label>
                            <input type="date" class="form-control" id="berlaku_sampai" name="berlaku_sampai"
                                required value="{{ $dokumenAgunan->berlaku_sampai->format('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required>{{ $dokumenAgunan->keterangan }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="files" class="form-label">Upload Dokumen</label>
                            <br>
                            <input type="file" id="files" name="files[]" required multiple>
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
