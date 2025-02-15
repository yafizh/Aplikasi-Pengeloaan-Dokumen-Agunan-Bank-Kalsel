<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunanPeminjaman;
use App\Models\DokumenAgunanPengembalian;
use Illuminate\Http\Request;

class DokumenAgunanPengembalianController extends Controller
{
    public function index()
    {
        $dokumenAgunanPengembalian = DokumenAgunanPengembalian::with(['peminjaman.dokumenAgunan', 'peminjaman.pegawai'])
            ->get()
            ->map(function ($item) {
                $tanggalPeminjaman = $item->peminjaman->tanggal_peminjaman->locale('ID');
                $item->tanggal_peminjaman_formatted = "{$tanggalPeminjaman->getTranslatedDayName()}, {$tanggalPeminjaman->day} {$tanggalPeminjaman->getTranslatedMonthName()} {$tanggalPeminjaman->year}";

                $tanggalPengembalian = $item->tanggal_pengembalian->locale('ID');
                $item->tanggal_pengembalian_formatted = "{$tanggalPengembalian->getTranslatedDayName()}, {$tanggalPengembalian->day} {$tanggalPengembalian->getTranslatedMonthName()} {$tanggalPengembalian->year}";

                return $item;
            });

        return view('pages.dokumen-agunan-pengembalian.index', compact('dokumenAgunanPengembalian'));
    }

    public function create()
    {
        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with('dokumenAgunan')->whereDoesntHave('pengembalian')->get();
        return view('pages.dokumen-agunan-pengembalian.create', compact('dokumenAgunanPeminjaman'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'dokumen_agunan_peminjaman_id' => 'required',
            'tanggal_pengembalian' => 'required'
        ]);

        DokumenAgunanPengembalian::create($data);

        return redirect(route('dokumen-agunan-pengembalian.index'))->with('message', 'Berhasil menambah pengembalian dokumen agunan');
    }

    public function show(DokumenAgunanPengembalian $dokumenAgunanPengembalian)
    {
        return view('pages.dokumen-agunan-pengembalian.show', compact('dokumenAgunanPengembalian'));
    }

    public function edit(DokumenAgunanPengembalian $dokumenAgunanPengembalian)
    {
        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with('dokumenAgunan')
            ->whereDoesntHave('pengembalian')
            ->orWhere('id', $dokumenAgunanPengembalian->dokumen_agunan_peminjaman_id)
            ->get();
        return view('pages.dokumen-agunan-pengembalian.edit', compact('dokumenAgunanPengembalian', 'dokumenAgunanPeminjaman'));
    }

    public function update(Request $request, DokumenAgunanPengembalian $dokumenAgunanPengembalian)
    {
        $data = $request->validate([
            'dokumen_agunan_peminjaman_id' => 'required',
            'tanggal_pengembalian' => 'required',
        ]);

        $dokumenAgunanPengembalian->update($data);

        return redirect(route('dokumen-agunan-pengembalian.index'))->with('message', 'Berhasil edit pengembalian dokumen agunan');
    }

    public function destroy(DokumenAgunanPengembalian $dokumenAgunanPengembalian)
    {
        $dokumenAgunanPengembalian->delete();
        return redirect(route('dokumen-agunan-pengembalian.index'))->with('message', 'Berhasil hapus pengembalian dokumen agunan');
    }
}
