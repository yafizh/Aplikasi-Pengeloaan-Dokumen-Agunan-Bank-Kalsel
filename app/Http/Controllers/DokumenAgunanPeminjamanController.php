<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\DokumenAgunanPeminjaman;
use App\Models\DokumenAgunanPengembalian;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DokumenAgunanPeminjamanController extends Controller
{
    public function index()
    {
        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with(['pegawai', 'dokumenAgunan'])
            ->get()
            ->map(function ($item) {
                $tanggalPeminjaman = $item->tanggal_peminjaman->locale('ID');
                $item->tanggal_peminjaman_formatted = "{$tanggalPeminjaman->getTranslatedDayName()}, {$tanggalPeminjaman->day} {$tanggalPeminjaman->getTranslatedMonthName()} {$tanggalPeminjaman->year}";

                return $item;
            });
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
            'tanggal_pengembalian' => 'required',
            'keperluan' => 'required'
        ]);

        $id = DokumenAgunanPeminjaman::create([
            'dokumen_agunan_id' => $data['dokumen_agunan_id'],
            'pegawai_id' => $data['pegawai_id'],
            'tanggal_peminjaman' => $data['tanggal_peminjaman'],
            'keperluan' => $data['keperluan']
        ])->id;
        DokumenAgunanPengembalian::create([
            'dokumen_agunan_peminjaman_id' => $id,
            'tanggal_pengembalian' => $data['tanggal_pengembalian']
        ]);

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
            'tanggal_pengembalian' => 'required',
            'keperluan' => 'required',
        ]);

        $dokumenAgunanPeminjaman->update([
            'dokumen_agunan_id' => $data['dokumen_agunan_id'],
            'pegawai_id' => $data['pegawai_id'],
            'tanggal_peminjaman' => $data['tanggal_peminjaman'],
            'keperluan' => $data['keperluan']
        ]);
        $dokumenAgunanPeminjaman->pengembalian->update([
            'tanggal_pengembalian' => $data['tanggal_pengembalian']
        ]);

        return redirect(route('dokumen-agunan-peminjaman.index'))->with('message', 'Berhasil edit peminjaman dokumen agunan');
    }

    public function destroy(DokumenAgunanPeminjaman $dokumenAgunanPeminjaman)
    {
        $dokumenAgunanPeminjaman->delete();
        return redirect(route('dokumen-agunan-peminjaman.index'))->with('message', 'Berhasil hapus peminjaman dokumen agunan');
    }
}
