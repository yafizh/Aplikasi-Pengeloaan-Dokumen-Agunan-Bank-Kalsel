<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\DokumenAgunanPeminjaman;
use App\Models\Lemari;

class ReportController extends Controller
{
    public function daftarAgunan()
    {
        $dokumenAgunan = DokumenAgunan::all()->map(function ($item) {
            $tanggalAkad = $item->tanggal_akad->locale('ID');
            $item->tanggal_akad_formatted = "{$tanggalAkad->getTranslatedDayName()}, {$tanggalAkad->day} {$tanggalAkad->getTranslatedMonthName()} {$tanggalAkad->year}";
            return $item;
        });
        return view('pages.report.daftar-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function statusVerifikasi()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.report.status-verifikasi-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function masaBerlaku()
    {
        $dokumenAgunan = DokumenAgunan::all()->map(function ($item) {
            $berlakuSampai = $item->berlaku_sampai->locale('ID');
            $item->berlaku_sampai_formatted = "{$berlakuSampai->getTranslatedDayName()}, {$berlakuSampai->day} {$berlakuSampai->getTranslatedMonthName()} {$berlakuSampai->year}";
            return $item;
        });
        return view('pages.report.masa-berlaku-dokumen-agunan', compact('dokumenAgunan'));
    }

    public function peminjamanPengembalian()
    {
        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with('dokumenAgunan', 'pegawai', 'pengembalian')
            ->get()
            ->map(function ($item) {
                $tanggalPeminjaman = $item->tanggal_peminjaman->locale('ID');
                $item->tanggal_peminjaman_formatted = "{$tanggalPeminjaman->getTranslatedDayName()}, {$tanggalPeminjaman->day} {$tanggalPeminjaman->getTranslatedMonthName()} {$tanggalPeminjaman->year}";

                if ($item->pengembalian) {
                    $tanggalPengembalian = $item->pengembalian->tanggal_pengembalian->locale('ID');
                    $item->tanggal_pengembalian_formatted = "{$tanggalPengembalian->getTranslatedDayName()}, {$tanggalPengembalian->day} {$tanggalPengembalian->getTranslatedMonthName()} {$tanggalPengembalian->year}";
                } else $item->tanggal_pengembalian_formatted = '-';

                return $item;
            });
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
