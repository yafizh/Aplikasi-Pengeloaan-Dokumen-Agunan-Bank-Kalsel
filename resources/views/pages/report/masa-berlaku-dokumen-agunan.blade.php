@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <form>
                    <div class="card-body d-flex justify-content-between align-items-end" style="gap: 1rem;">
                        <div class="d-flex" style="gap: 1rem;">
                            <div>
                                <label for="dari_berlaku_sampai" class="form-label">Dari Berlaku Sampai</label>
                                <input type="date" class="form-control" id="dari_berlaku_sampai"
                                    name="dari_berlaku_sampai" required value="{{ request()->get('dari_berlaku_sampai') }}"
                                    required>
                            </div>
                            <div>
                                <label for="sampai_berlaku_sampai" class="form-label">Sampai Berlaku Sampai</label>
                                <input type="date" class="form-control" id="sampai_berlaku_sampai"
                                    name="sampai_berlaku_sampai" required
                                    value="{{ request()->get('sampai_berlaku_sampai') }}" required>
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
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h4>Laporan Masa Berlaku Dokumen Agunan</h4>
                        <a href="{{ url('/cetak/masa-berlaku') }}" class="btn btn-primary" target="_blank">Cetak</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Cif</th>
                                    <th class="text-center">Nama Nasabah</th>
                                    <th class="text-center">Nomor Rekening</th>
                                    <th class="text-center">Berlaku Sampai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($dokumenAgunan))
                                    @foreach ($dokumenAgunan as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->cif }}</td>
                                            <td>{{ $item->nasabah_nama }}</td>
                                            <td class="text-center">{{ $item->nasabah_nomor_rekening }}</td>
                                            <td class="text-center">{{ $item->berlaku_sampai_formatted }}</td>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example', {
            language: {
                emptyTable: 'Data Tidak Ada'
            }
        });
    </script>
@endsection
