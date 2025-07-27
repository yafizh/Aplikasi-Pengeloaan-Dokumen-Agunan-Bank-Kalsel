@extends('layout.master')

@section('content')
    <div class="row">
     <div class="col-12 mb-3">
            <div class="card">
                <form>
                    <div class="card-body d-flex justify-content-between align-items-end" style="gap: 1rem;">
                        <div class="d-flex" style="gap: 1rem;">
                            <div>
                                <label for="jenis_agunan" class="form-label">Jenis Agunan</label>
                                <select name="jenis_agunan" id="jenis_agunan" class="form-control" required>
                                    <option value="" selected disabled>Semua Jenis Agunan</option>
                                    <option {{request()->get('jenis_agunan') == 'SHM' ? 'selected' : ''}} value="SHM">SHM</option>
                                    <option {{request()->get('jenis_agunan') == 'SK' ? 'selected' : ''}} value="SK">SK</option>
                                    <option {{request()->get('jenis_agunan') == 'BPKB' ? 'selected' : ''}} value="BPKB">BPKB</option>
                                </select>
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
                        <h4>Laporan Nasabah</h4>
                        <a href="{{ url('/cetak/nasabah') }}" class="btn btn-primary" target="_blank">Cetak</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nomor Rekening</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (count($nasabah))
                                    @foreach ($nasabah as $i => $item)
                                        <tr>
                                            <td class="text-center">{{ $i + 1 }}</td>
                                            <td class="text-center">{{ $item->nama }}</td>
                                            <td class="text-center">{{ $item->dokumenAgunan->count() }}</td>
                                            <td class="text-center">{{ $item->dokumenAgunanPeminjaman->count() }}</td>
                                        </tr>
                                    @endforeach
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
