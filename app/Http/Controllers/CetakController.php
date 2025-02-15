<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\DokumenAgunanPeminjaman;
use App\Models\Lemari;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function daftarAgunan()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.cetak.daftar-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function statusVerifikasi()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.cetak.status-verifikasi-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function masaBerlaku()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.cetak.masa-berlaku-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function peminjamanPengembalian()
    {
        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with('dokumenAgunan', 'pegawai', 'pengembalian')->get();
        return view('pages.cetak.peminjaman-pengembalian-dokumen-agunan', compact('dokumenAgunanPeminjaman'));
    }

    public function letakDokumenAgunan()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.cetak.letak-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function ketersediaanRuangPenyimpanan()
    {
        $lemari = Lemari::with('details')->get();
        return view('pages.cetak.ketersediaan-ruang-penyimpanan', compact('lemari'));
    }
}
