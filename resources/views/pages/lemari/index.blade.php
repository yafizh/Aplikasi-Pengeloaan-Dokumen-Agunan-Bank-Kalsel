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
                        <h4>Lemari</h4>
                        <a href="{{ route('lemari.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Lokasi</th>
                                    <th class="text-center" style="width: 1%;white-space: nowrap;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($lemari))
                                    @foreach ($lemari as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->nama }}</td>
                                            <td class="text-center">{{ $item->lokasi }}</td>
                                            <td class="d-flex" style="gap: .6rem;">
                                                <a href="{{ route('lemari.show', $item->id) }}"
                                                    class="btn btn-info">Lihat</a>
                                                <a href="{{ route('lemari.edit', $item->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('lemari.destroy', $item->id) }}" method="POST">
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
