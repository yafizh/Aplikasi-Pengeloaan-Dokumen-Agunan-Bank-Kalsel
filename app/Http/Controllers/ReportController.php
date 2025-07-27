<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\DokumenAgunanPeminjaman;
use App\Models\Lemari;
use App\Models\Nasabah;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function daftarAgunan(Request $request)
    {
        $dariTanggalAkad = $request->get('dari_tanggal_akad') ?? null;
        $sampaiTanggalAkad = $request->get('sampai_tanggal_akad') ?? null;

        $dokumenAgunan = DokumenAgunan::with('nasabah');
        $urlCetak = '/cetak/daftar-agunan';

        if ($dariTanggalAkad && $sampaiTanggalAkad) {
            $dokumenAgunan = $dokumenAgunan->whereBetween('tanggal_akad', [$dariTanggalAkad, $sampaiTanggalAkad]);
            $urlCetak .= "?dari_tanggal_akad={$dariTanggalAkad}&sampai_tanggal_akad={$sampaiTanggalAkad}";
        }

        $dokumenAgunan = $dokumenAgunan->get()->map(function ($item) {
            $tanggalAkad = $item->tanggal_akad->locale('ID');
            $item->tanggal_akad_formatted = "{$tanggalAkad->getTranslatedDayName()}, {$tanggalAkad->day} {$tanggalAkad->getTranslatedMonthName()} {$tanggalAkad->year}";
            return $item;
        });

        return view('pages.report.daftar-dokumen-agunan', compact('dokumenAgunan', 'urlCetak'));
    }

    public function statusVerifikasi(Request $request)
    {
        $dariTanggalAkad = $request->get('dari_tanggal_akad') ?? null;
        $sampaiTanggalAkad = $request->get('sampai_tanggal_akad') ?? null;

        $dokumenAgunan = DokumenAgunan::with('nasabah');
        $urlCetak = '/cetak/status-verifikasi';

        if ($dariTanggalAkad && $sampaiTanggalAkad) {
            $dokumenAgunan = $dokumenAgunan->whereBetween('tanggal_akad', [$dariTanggalAkad, $sampaiTanggalAkad]);
            $urlCetak .= "?dari_tanggal_akad={$dariTanggalAkad}&sampai_tanggal_akad={$sampaiTanggalAkad}";
        }

        $dokumenAgunan = $dokumenAgunan->get()->map(function ($item) {
            $tanggalAkad = $item->tanggal_akad->locale('ID');
            $item->tanggal_akad_formatted = "{$tanggalAkad->getTranslatedDayName()}, {$tanggalAkad->day} {$tanggalAkad->getTranslatedMonthName()} {$tanggalAkad->year}";
            return $item;
        });

        return view('pages.report.status-verifikasi-dokumen-agunan', compact('dokumenAgunan', 'urlCetak'));
    }

    public function masaBerlaku(Request $request)
    {
        $dariBerlakuSampai = $request->get('dari_berlaku_sampai') ?? null;
        $sampaiBerlakuSampai = $request->get('sampai_berlaku_sampai') ?? null;

        $dokumenAgunan = DokumenAgunan::with('nasabah');
        $urlCetak = '/cetak/masa-berlaku';

        if ($dariBerlakuSampai && $sampaiBerlakuSampai) {
            $dokumenAgunan = $dokumenAgunan->whereBetween('berlaku_sampai', [$dariBerlakuSampai, $sampaiBerlakuSampai]);
            $urlCetak .= "?dari_berlaku_sampai={$dariBerlakuSampai}&sampai_berlaku_sampai={$sampaiBerlakuSampai}";
        }

        $dokumenAgunan = $dokumenAgunan->get()->map(function ($item) {
            $berlakuSampai = $item->berlaku_sampai->locale('ID');
            $item->berlaku_sampai_formatted = "{$berlakuSampai->getTranslatedDayName()}, {$berlakuSampai->day} {$berlakuSampai->getTranslatedMonthName()} {$berlakuSampai->year}";
            return $item;
        });

        return view('pages.report.masa-berlaku-dokumen-agunan', compact('dokumenAgunan', 'urlCetak'));
    }

    public function peminjamanPengembalian(Request $request)
    {
        $dariTanggalPeminjaman = $request->get('dari_tanggal_peminjaman') ?? null;
        $sampaiTanggalPeminjaman = $request->get('sampai_tanggal_peminjaman') ?? null;

        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with('dokumenAgunan.nasabah', 'pegawai', 'pengembalian');
        $urlCetak = '/cetak/peminjaman-pengembalian';

        if ($dariTanggalPeminjaman && $sampaiTanggalPeminjaman) {
            $dokumenAgunanPeminjaman = $dokumenAgunanPeminjaman->whereBetween('tanggal_peminjaman', [$dariTanggalPeminjaman, $sampaiTanggalPeminjaman]);
            $urlCetak .= "?dari_tanggal_peminjaman={$dariTanggalPeminjaman}&sampai_tanggal_peminjaman={$sampaiTanggalPeminjaman}";
        }

        $dokumenAgunanPeminjaman = $dokumenAgunanPeminjaman
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
        return view('pages.report.peminjaman-pengembalian-dokumen-agunan', compact('dokumenAgunanPeminjaman', 'urlCetak'));
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

    public function nasabah()
    {
        $urlCetak = '';
        $nasabah = Nasabah::all();
        return view('pages.report.nasabah', compact('nasabah', 'urlCetak'));
    }

    public function pegawai(Request $request)
    {
        $jumlahPeminjaman = $request->get('jumlah_peminjaman') ?? 0;

        $pegawai = Pegawai::with([
            'dokumenAgunan',
            'dokumenAgunanPeminjaman'
        ]);
        $urlCetak = '/cetak/pegawai';

        if ($jumlahPeminjaman > 0) {
            $pegawai = $pegawai->whereHas('dokumenAgunanPeminjaman', fn() => null, '>=', $jumlahPeminjaman);
            $urlCetak .= "?jumlah_peminjaman={$jumlahPeminjaman}";
        }

        $pegawai = $pegawai->get();

        return view('pages.report.pegawai', compact('pegawai', 'urlCetak'));
    }
}
