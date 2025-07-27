<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\DokumenAgunanPeminjaman;
use App\Models\Lemari;
use App\Models\Nasabah;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function daftarAgunan(Request $request)
    {
        $dariTanggalAkad = $request->get('dari_tanggal_akad') ?? null;
        $sampaiTanggalAkad = $request->get('sampai_tanggal_akad') ?? null;

        $dokumenAgunan = DokumenAgunan::with('nasabah');
        $filter = [];

        if ($dariTanggalAkad && $sampaiTanggalAkad) {
            $dokumenAgunan = $dokumenAgunan->whereBetween('tanggal_akad', [$dariTanggalAkad, $sampaiTanggalAkad]);
            $dariTanggalAkad = Carbon::createFromDate($dariTanggalAkad)->locale('ID');
            $sampaiTanggalAkad = Carbon::createFromDate($sampaiTanggalAkad)->locale('ID');
            $filter['dari_tanggal_akad'] = "{$dariTanggalAkad->day} {$dariTanggalAkad->getTranslatedMonthName()} {$dariTanggalAkad->year}";
            $filter['sampai_tanggal_akad'] = "{$sampaiTanggalAkad->day} {$sampaiTanggalAkad->getTranslatedMonthName()} {$sampaiTanggalAkad->year}";
        }

        $dokumenAgunan = $dokumenAgunan->get()->map(function ($item) {
            $tanggalAkad = $item->tanggal_akad->locale('ID');
            $item->tanggal_akad_formatted = "{$tanggalAkad->getTranslatedDayName()}, {$tanggalAkad->day} {$tanggalAkad->getTranslatedMonthName()} {$tanggalAkad->year}";
            return $item;
        });

        return view('pages.cetak.daftar-dokumen-agunan', compact('dokumenAgunan', 'filter'));
    }

    public function statusVerifikasi(Request $request)
    {
        $dariTanggalAkad = $request->get('dari_tanggal_akad') ?? null;
        $sampaiTanggalAkad = $request->get('sampai_tanggal_akad') ?? null;

        $dokumenAgunan = DokumenAgunan::with('nasabah');
        $filter = [];

        if ($dariTanggalAkad && $sampaiTanggalAkad) {
            $dokumenAgunan = $dokumenAgunan->whereBetween('tanggal_akad', [$dariTanggalAkad, $sampaiTanggalAkad]);
            $dariTanggalAkad = Carbon::createFromDate($dariTanggalAkad)->locale('ID');
            $sampaiTanggalAkad = Carbon::createFromDate($sampaiTanggalAkad)->locale('ID');
            $filter['dari_tanggal_akad'] = "{$dariTanggalAkad->day} {$dariTanggalAkad->getTranslatedMonthName()} {$dariTanggalAkad->year}";
            $filter['sampai_tanggal_akad'] = "{$sampaiTanggalAkad->day} {$sampaiTanggalAkad->getTranslatedMonthName()} {$sampaiTanggalAkad->year}";
        }

        $dokumenAgunan = $dokumenAgunan->get()->map(function ($item) {
            $tanggalAkad = $item->tanggal_akad->locale('ID');
            $item->tanggal_akad_formatted = "{$tanggalAkad->getTranslatedDayName()}, {$tanggalAkad->day} {$tanggalAkad->getTranslatedMonthName()} {$tanggalAkad->year}";
            return $item;
        });

        return view('pages.cetak.status-verifikasi-dokumen-agunan', compact('dokumenAgunan', 'filter'));
    }

    public function masaBerlaku(Request $request)
    {
        $dariBerlakuSampai = $request->get('dari_berlaku_sampai') ?? null;
        $sampaiBerlakuSampai = $request->get('sampai_berlaku_sampai') ?? null;

        $dokumenAgunan = DokumenAgunan::with('nasabah');
        $filter = [];

        if ($dariBerlakuSampai && $sampaiBerlakuSampai) {
            $dokumenAgunan = $dokumenAgunan->whereBetween('berlaku_sampai', [$dariBerlakuSampai, $sampaiBerlakuSampai]);
            $dariBerlakuSampai = Carbon::createFromDate($dariBerlakuSampai)->locale('ID');
            $sampaiBerlakuSampai = Carbon::createFromDate($sampaiBerlakuSampai)->locale('ID');
            $filter['dari_berlaku_sampai'] = "{$dariBerlakuSampai->day} {$dariBerlakuSampai->getTranslatedMonthName()} {$dariBerlakuSampai->year}";
            $filter['sampai_berlaku_sampai'] = "{$sampaiBerlakuSampai->day} {$sampaiBerlakuSampai->getTranslatedMonthName()} {$sampaiBerlakuSampai->year}";
        }

        $dokumenAgunan = $dokumenAgunan->get()->map(function ($item) {
            $berlakuSampai = $item->berlaku_sampai->locale('ID');
            $item->berlaku_sampai_formatted = "{$berlakuSampai->getTranslatedDayName()}, {$berlakuSampai->day} {$berlakuSampai->getTranslatedMonthName()} {$berlakuSampai->year}";
            return $item;
        });

        return view('pages.cetak.masa-berlaku-dokumen-agunan', compact('dokumenAgunan', 'filter'));
    }

    public function peminjamanPengembalian(Request $request)
    {
        $dariTanggalPeminjaman = $request->get('dari_tanggal_peminjaman') ?? null;
        $sampaiTanggalPeminjaman = $request->get('sampai_tanggal_peminjaman') ?? null;

        $dokumenAgunanPeminjaman = DokumenAgunanPeminjaman::with('dokumenAgunan.nasabah', 'pegawai', 'pengembalian');
        $filter = [];

        if ($dariTanggalPeminjaman && $sampaiTanggalPeminjaman) {
            $dokumenAgunanPeminjaman = $dokumenAgunanPeminjaman->whereBetween('tanggal_peminjaman', [$dariTanggalPeminjaman, $sampaiTanggalPeminjaman]);
            $dariTanggalPeminjaman = Carbon::createFromDate($dariTanggalPeminjaman)->locale('ID');
            $sampaiTanggalPeminjaman = Carbon::createFromDate($sampaiTanggalPeminjaman)->locale('ID');
            $filter['dari_tanggal_peminjaman'] = "{$dariTanggalPeminjaman->day} {$dariTanggalPeminjaman->getTranslatedMonthName()} {$dariTanggalPeminjaman->year}";
            $filter['sampai_tanggal_peminjaman'] = "{$sampaiTanggalPeminjaman->day} {$sampaiTanggalPeminjaman->getTranslatedMonthName()} {$sampaiTanggalPeminjaman->year}";
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
        return view('pages.cetak.peminjaman-pengembalian-dokumen-agunan', compact('dokumenAgunanPeminjaman', 'filter'));
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

    public function nasabah()
    {
        $nasabah = Nasabah::all();
        return view('pages.cetak.nasabah', compact('nasabah'));
    }

    public function pegawai(Request $request)
    {
        $filter = ['jumlah_peminjaman' => $request->get('jumlah_peminjaman') ?? 0];

        $pegawai = Pegawai::with([
            'dokumenAgunan',
            'dokumenAgunanPeminjaman'
        ]);

        if ($filter['jumlah_peminjaman'] > 0) {
            $pegawai = $pegawai->whereHas('dokumenAgunanPeminjaman', fn() => null, '>=', $filter['jumlah_peminjaman']);
        }

        $pegawai = $pegawai->get();

        return view('pages.cetak.pegawai', compact('pegawai'));
    }
}
