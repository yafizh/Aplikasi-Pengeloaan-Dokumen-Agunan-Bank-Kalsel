@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            value="{{ $lemari->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="lokasi" class="form-control" id="lokasi" name="lokasi"
                            value="{{ $lemari->lokasi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" disabled required>{{ $lemari->keterangan }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Detail Lemari</h4>
                        <a href="{{ route('lemari-detail.create', ['lemari_id' => $lemari->id]) }}"
                            class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nomor</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" style="width: 1%;white-space: nowrap;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($lemariDetails))
                                    @foreach ($lemariDetails as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->nomor }}</td>
                                            <td class="text-center">
                                                @if ($item->status === 'Tersedia')
                                                    <span class="badge bg-success">{{ $item->status }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td class="d-flex" style="gap: .6rem;">
                                                <a href="{{ route('lemari-detail.edit', [$item->id, 'lemari_id' => $lemari->id]) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form
                                                    action="{{ route('lemari-detail.destroy', [$item->id, 'lemari_id' => $lemari->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Data Tidak Ada</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
