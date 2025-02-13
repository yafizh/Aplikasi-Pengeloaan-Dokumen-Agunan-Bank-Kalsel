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
                    <form action="{{ route('dokumen-agunan.update', $dokumenAgunan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required
                                value="{{ $dokumenAgunan->nama }}">
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
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required>{{ $dokumenAgunan->keterangan }}</textarea>
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
