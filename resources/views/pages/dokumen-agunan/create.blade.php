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
                            <label for="nama" class="form-label">Nama Dokumen</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nasabah_id" class="form-label">Nasabah</label>
                            <select name="nasabah_id" id="nasabah_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Nasabah</option>
                                @foreach ($nasabah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
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
