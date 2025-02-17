<?php

namespace App\Http\Controllers;

use App\Models\DokumenAgunan;
use App\Models\Lemari;
use App\Models\LemariDetail;
use App\Models\Nasabah;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DokumenAgunanController extends Controller
{
    public function index()
    {
        $dokumenAgunan = DokumenAgunan::all();
        return view('pages.dokumen-agunan.index', compact('dokumenAgunan'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        $nasabah = Nasabah::all();
        $lemari = Lemari::with(['details' => fn($query) => $query->where('status', 'Tersedia')])->get();
        return view('pages.dokumen-agunan.create', compact('pegawai', 'nasabah', 'lemari'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nasabah_nama' => 'required',
            'nasabah_nomor_rekening' => 'required',
            'pegawai_id' => 'required',
            'lemari_detail_id' => 'required',
            'cif' => 'required',
            'jenis_kredit' => 'required',
            'jenis_agunan' => 'required',
            'tanggal_akad' => 'required|date',
            'berlaku_sampai' => 'required|date',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        DokumenAgunan::create([
            'nasabah_nama' => $data['nasabah_nama'],
            'nasabah_nomor_rekening' => $data['nasabah_nomor_rekening'],
            'pegawai_id' => $data['pegawai_id'],
            'lemari_detail_id' => $data['lemari_detail_id'],
            'cif' => $data['cif'],
            'jenis_kredit' => $data['jenis_kredit'],
            'jenis_agunan' => $data['jenis_agunan'],
            'tanggal_akad' => $data['tanggal_akad'],
            'berlaku_sampai' => $data['berlaku_sampai'],
            'status' => $data['status'],
            'keterangan' => $data['keterangan'],
        ]);
        LemariDetail::where('id', $data['lemari_detail_id'])->update(['status' => 'Tidak Tersedia']);

        return redirect(route('dokumen-agunan.index'))->with('message', 'Berhasil menambah dokumen agunan');
    }

    public function show(DokumenAgunan $dokumenAgunan)
    {
        $tanggalAkad = $dokumenAgunan->tanggal_akad->locale('ID');
        $dokumenAgunan->tanggal_akad_formatted = "{$tanggalAkad->getTranslatedDayName()}, {$tanggalAkad->day} {$tanggalAkad->getTranslatedMonthName()} {$tanggalAkad->year}";

        $berlakuSampai = $dokumenAgunan->berlaku_sampai->locale('ID');
        $dokumenAgunan->berlaku_sampai_formatted = "{$berlakuSampai->getTranslatedDayName()}, {$berlakuSampai->day} {$berlakuSampai->getTranslatedMonthName()} {$berlakuSampai->year}";
        return view('pages.dokumen-agunan.show', compact('dokumenAgunan'));
    }

    public function edit(DokumenAgunan $dokumenAgunan)
    {
        $pegawai = Pegawai::all();
        $nasabah = Nasabah::all();
        $lemari = Lemari::with(['details' => fn($query) => $query->where('status', 'Tersedia')->orWhere('id', $dokumenAgunan->lemariDetail->id)])->get();
        return view('pages.dokumen-agunan.edit', compact('dokumenAgunan', 'pegawai', 'nasabah', 'lemari'));
    }

    public function update(Request $request, DokumenAgunan $dokumenAgunan)
    {
        $data = $request->validate([
            'nasabah_nama' => 'required',
            'nasabah_nomor_rekening' => 'required',
            'pegawai_id' => 'required',
            'lemari_detail_id' => 'required',
            'cif' => 'required',
            'jenis_kredit' => 'required',
            'jenis_agunan' => 'required',
            'tanggal_akad' => 'required|date',
            'berlaku_sampai' => 'required|date',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        if ($dokumenAgunan->lemariDetail->id != $data['lemari_detail_id']) {
            LemariDetail::where('id', $dokumenAgunan->lemariDetail->id)->update(['status' => 'Tersedia']);
        }

        $dokumenAgunan->update($data);
        LemariDetail::where('id', $data['lemari_detail_id'])->update(['status' => 'Tidak Tersedia']);

        return redirect(route('dokumen-agunan.index'))->with('message', 'Berhasil edit dokumen agunan');
    }

    public function destroy(DokumenAgunan $dokumenAgunan)
    {
        $dokumenAgunan->delete();
        LemariDetail::where('id', $dokumenAgunan->lemariDetail->id)->update(['status' => 'Tersedia']);
        return redirect(route('dokumen-agunan.index'))->with('message', 'Berhasil hapus dokumen agunan');
    }
}
