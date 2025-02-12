<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pages.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pages.pegawai.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $pengguna = Pengguna::create([
            'username' => $data['email'],
            'password' => $data['email'],
            'status'   => 'Pegawai'
        ]);

        $data['pengguna_id'] = $pengguna->id;
        Pegawai::create($data);

        return redirect(route('pegawai.index'))->with('message', 'Berhasil menambah pegawai');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pages.pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pages.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $pegawai->pengguna->update(['username' => $data['email']]);
        $pegawai->update($data);

        return redirect(route('pegawai.index'))->with('message', 'Berhasil edit pegawai');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect(route('pegawai.index'))->with('message', 'Berhasil hapus pegawai');
    }
}
