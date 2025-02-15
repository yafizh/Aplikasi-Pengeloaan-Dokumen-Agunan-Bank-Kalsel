@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Detail Pegawai</h4>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            value="{{ $pegawai->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $pegawai->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="nomor_telepon" class="form-control" id="nomor_telepon" name="nomor_telepon"
                            value="{{ $pegawai->nomor_telepon }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required disabled>{{ $pegawai->alamat }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
