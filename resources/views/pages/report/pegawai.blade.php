@extends('layout.master')

@section('content')
    <div class="row">
    <div class="col-12 mb-3">
            <div class="card">
                <form>
                    <div class="card-body d-flex justify-content-between align-items-end" style="gap: 1rem;">
                        <div class="d-flex" style="gap: 1rem;">
                            <div>
                                <label for="jumlah_peminjaman" class="form-label">Jumlah Peminjaman Lebih Dari</label>
                                <input type="number" class="form-control" id="jumlah_peminjaman"
                                    name="jumlah_peminjaman" required value="{{ request()->get('jumlah_peminjaman') ?? 0 }}"
                                    required>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Filter</button>
                            <a href="{{ url($urlCetak) }}" class="btn btn-primary" target="_blank">Cetak</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Laporan Pegawai</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jumlah Pelayanan</th>
                                    <th class="text-center">Jumlah Peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($pegawai))
                                    @foreach ($pegawai as $i => $item)
                                        <tr>
                                            <td class="text-center">{{ $i + 1 }}</td>
                                            <td class="text-center">{{ $item->nama }}</td>
                                            <td class="text-center">{{ $item->dokumenAgunan->count() }}</td>
                                            <td class="text-center">{{ $item->dokumenAgunanPeminjaman->count() }}</td>
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
