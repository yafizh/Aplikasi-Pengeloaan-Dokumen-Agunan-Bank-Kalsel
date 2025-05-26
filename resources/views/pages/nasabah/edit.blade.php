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
                        <h4>Edit Nasabah</h4>
                        <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <form action="{{ route('nasabah.update', $nasabah->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required
                                value="{{ $nasabah->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
                            <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" required
                                value="{{ $nasabah->nomor_rekening }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                                value="{{ $nasabah->tanggal_lahir->format('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="d-flex" style="gap: 1rem;">
                                <div>
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki - Laki"
                                        required {{ $nasabah->jenis_kelamin == 'Laki - Laki' ? 'checked' : '' }}>
                                    <label for="jenis_kelamin1">
                                        Laki - Laki
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"
                                        required {{ $nasabah->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                    <label for="jenis_kelamin2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $nasabah->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="nomor_telepon" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                value="{{ $nasabah->nomor_telepon }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required>{{ $nasabah->alamat }}</textarea>
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
