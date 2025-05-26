<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = Nasabah::all();
        return view('pages.nasabah.index', compact('nasabah'));
    }

    public function create()
    {
        return view('pages.nasabah.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'nomor_rekening' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Nasabah::create($data);

        return redirect(route('nasabah.index'))->with('message', 'Berhasil menambah nasabah');
    }

    public function show(Nasabah $nasabah)
    {
        $tanggalLahir = $nasabah->tanggal_lahir->locale('ID');
        $nasabah->tanggal_lahir_formatted = "{$tanggalLahir->getTranslatedDayName()}, {$tanggalLahir->day} {$tanggalLahir->getTranslatedMonthName()} {$tanggalLahir->year}";

        return view('pages.nasabah.show', compact('nasabah'));
    }

    public function edit(Nasabah $nasabah)
    {
        return view('pages.nasabah.edit', compact('nasabah'));
    }

    public function update(Request $request, Nasabah $nasabah)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'nomor_rekening' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $nasabah->update($data);

        return redirect(route('nasabah.index'))->with('message', 'Berhasil edit nasabah');
    }

    public function destroy(Nasabah $nasabah)
    {
        $nasabah->delete();
        return redirect(route('nasabah.index'))->with('message', 'Berhasil hapus nasabah');
    }
}
