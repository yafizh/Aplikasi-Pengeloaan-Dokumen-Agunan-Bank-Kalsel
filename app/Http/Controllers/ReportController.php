<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\DokumenAgunanPeminjaman;
use App\Models\Lemari;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function daftarAgunan()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.report.daftar-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function statusVerifikasi()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.report.status-verifikasi-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function masaBerlaku()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.report.masa-berlaku-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function peminjamanPengembalian()
    {
        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with('dokumenAgunan', 'pegawai', 'pengembalian')->get();
        return view('pages.report.peminjaman-pengembalian-dokumen-agunan', compact('dokumenAgunanPeminjaman'));
    }

    public function letakDokumenAgunan()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.report.letak-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function ketersediaanRuangPenyimpanan()
    {
        $lemari = Lemari::with('details')->get();
        return view('pages.report.ketersediaan-ruang-penyimpanan', compact('lemari'));
    }
}
