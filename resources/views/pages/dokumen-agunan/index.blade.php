@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            @session('message')
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endsession
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Dokumen Agunan</h4>
                        <a href="{{ route('dokumen-agunan.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Cif</th>
                                    <th class="text-center">Nama Nasabah</th>
                                    <th class="text-center">Pegawai Penerima Dokumen</th>
                                    <th class="text-center" style="width: 1%;white-space: nowrap;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($dokumenAgunan))
                                    @foreach ($dokumenAgunan as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->cif }}</td>
                                            <td class="text-center">{{ $item->nasabah->nama }}</td>
                                            <td class="text-center">{{ $item->pegawai->nama }}</td>
                                            <td class="d-flex" style="gap: .6rem;">
                                                <a href="{{ route('dokumen-agunan.show', $item->id) }}"
                                                    class="btn btn-info">Lihat</a>
                                                <a href="{{ route('dokumen-agunan.edit', $item->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('dokumen-agunan.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
