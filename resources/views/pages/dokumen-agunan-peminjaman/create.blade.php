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
                        <h4>Tambah Peminjaman Dokumen Agunan</h4>
                        <a href="{{ route('dokumen-agunan-peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <form action="{{ route('dokumen-agunan-peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="dokumen_agunan_id" class="form-label">Dokumen Nasabah Yang Dipinjam</label>
                            <select name="dokumen_agunan_id" id="dokumen_agunan_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Dokumen Agunanan</option>
                                @foreach ($dokumenAgunan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nasabah_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pegawai_id" class="form-label">Pegawai Peminjam Dokumen</label>
                            <select name="pegawai_id" id="pegawai_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Pegawai</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="keperluan" class="form-label">Keperluan</label>
                            <textarea name="keperluan" id="keperluan" class="form-control" required></textarea>
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
