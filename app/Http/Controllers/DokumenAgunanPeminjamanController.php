<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\DokumenAgunanPeminjaman;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DokumenAgunanPeminjamanController extends Controller
{
    public function index()
    {
        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with(['pegawai','dokumenAgunan'])->get();
        return view('pages.dokumen-agunan-peminjaman.index', compact('dokumenAgunanPeminjaman'));
    }

    public function create()
    {
        $dokumenAgunan = DokumenAgunan::whereDoesntHave('peminjaman')->orWhereHas('peminjaman', fn($query) => $query->whereHas('pengembalian'))->get();
        $pegawai = Pegawai::all();
        return view('pages.dokumen-agunan-peminjaman.create', compact('dokumenAgunan', 'pegawai'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'dokumen_agunan_id' => 'required',
            'pegawai_id' => 'required',
            'tanggal_peminjaman' => 'required',
            'keperluan' => 'required'
        ]);

        DokumenAgunanPeminjaman::create($data);

        return redirect(route('dokumen-agunan-peminjaman.index'))->with('message', 'Berhasil menambah peminjaman dokumen agunan');
    }

    public function show(DokumenAgunanPeminjaman $dokumenAgunanPeminjaman)
    {
        return view('pages.dokumen-agunan-peminjaman.show', compact('dokumenAgunanPeminjaman'));
    }

    public function edit(DokumenAgunanPeminjaman $dokumenAgunanPeminjaman)
    {
        $dokumenAgunan = DokumenAgunan::whereDoesntHave('peminjaman')
            ->orWhere('id', $dokumenAgunanPeminjaman->dokumen_agunan_id)
            ->orWhereHas('peminjaman', fn($query) => $query->whereHas('pengembalian'))
            ->get();
        $pegawai = Pegawai::all();
        return view('pages.dokumen-agunan-peminjaman.edit', compact('dokumenAgunanPeminjaman', 'dokumenAgunan', 'pegawai'));
    }

    public function update(Request $request, DokumenAgunanPeminjaman $dokumenAgunanPeminjaman)
    {
        $data = $request->validate([
            'dokumen_agunan_id' => 'required',
            'pegawai_id' => 'required',
            'tanggal_peminjaman' => 'required',
            'keperluan' => 'required',
        ]);

        $dokumenAgunanPeminjaman->update($data);

        return redirect(route('dokumen-agunan-peminjaman.index'))->with('message', 'Berhasil edit peminjaman dokumen agunan');
    }

    public function destroy(DokumenAgunanPeminjaman $dokumenAgunanPeminjaman)
    {
        $dokumenAgunanPeminjaman->delete();
        return redirect(route('dokumen-agunan-peminjaman.index'))->with('message', 'Berhasil hapus peminjaman dokumen agunan');
    }
}
