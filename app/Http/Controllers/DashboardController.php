<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\LemariDetail;
use App\Models\Nasabah;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai       = Pegawai::select()->count();
        $totalNasabah       = Nasabah::select()->count();
        $totalLemari        = LemariDetail::select()->count();
        $totalDokumenAgunan = DokumenAgunan::select()->count();
        $dokumenAgunan      = DokumenAgunan::orderBy('berlaku_sampai')
            ->take(10)
            ->get()
            ->map(function ($item) {
                $berlakuSampai = $item->berlaku_sampai;
                return [
                    'cif'               => $item->cif,
                    'nasabah'           => $item->nasabah->nama,
                    'pegawai'           => $item->pegawai->nama,
                    'berlaku_sampai'    => "{$berlakuSampai->day} {$berlakuSampai->locale('ID')->getTranslatedMonthName()} {$berlakuSampai->year}",
                ];
            });

        return view('dashboard', compact(
            'totalPegawai',
            'totalNasabah',
            'totalLemari',
            'totalDokumenAgunan',
            'dokumenAgunan'
        ));
    }
}
