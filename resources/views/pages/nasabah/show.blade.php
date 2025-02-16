@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Detail Nasabah</h4>
                        <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            value="{{ $nasabah->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                            value="{{ $nasabah->tanggal_lahir_formatted }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required
                            value="{{ $nasabah->jenis_kelamin }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
                        <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" required
                            value="{{ $nasabah->nomor_rekening }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $nasabah->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="nomor_telepon" class="form-control" id="nomor_telepon" name="nomor_telepon"
                            value="{{ $nasabah->nomor_telepon }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required disabled>{{ $nasabah->alamat }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
