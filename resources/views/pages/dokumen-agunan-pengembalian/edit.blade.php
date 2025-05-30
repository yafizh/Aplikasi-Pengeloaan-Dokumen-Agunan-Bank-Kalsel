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
                        <h4>Edit Pengembalian Dokumen Agunan</h4>
                        <a href="{{ route('dokumen-agunan-pengembalian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <form action="{{ route('dokumen-agunan-pengembalian.update', $dokumenAgunanPengembalian->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="dokumen_agunan_peminjaman_id" class="form-label">Dokumen Yang Dipinjam</label>
                            <select name="dokumen_agunan_peminjaman_id" id="dokumen_agunan_peminjaman_id"
                                class="form-control" required>
                                @foreach ($dokumenAgunanPeminjaman as $item)
                                    <option
                                        {{ $item->id == $dokumenAgunanPengembalian->dokumen_peminjaman_id ? 'selected' : '' }}
                                        value="{{ $item->id }}">
                                        {{ $item->dokumenAgunan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control"
                                required value="{{ $dokumenAgunanPengembalian->tanggal_pengembalian->format('Y-m-d') }}">
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
