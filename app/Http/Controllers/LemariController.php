<?php

namespace App\Http\Controllers;

use App\Models\Lemari;
use Illuminate\Http\Request;

class LemariController extends Controller
{
    public function index()
    {
        $lemari = Lemari::all();
        return view('pages.lemari.index', compact('lemari'));
    }

    public function create()
    {
        return view('pages.lemari.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ]);

        Lemari::create($data);

        return redirect(route('lemari.index'))->with('message', 'Berhasil menambah lemari');
    }

    public function show(Lemari $lemari)
    {
        $lemariDetails = $lemari->details;
        return view('pages.lemari.show', compact('lemari','lemariDetails'));
    }

    public function edit(Lemari $lemari)
    {
        return view('pages.lemari.edit', compact('lemari'));
    }

    public function update(Request $request, Lemari $lemari)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ]);

        $lemari->update($data);

        return redirect(route('lemari.index'))->with('message', 'Berhasil edit lemari');
    }

    public function destroy(Lemari $lemari)
    {
        $lemari->delete();
        return redirect(route('lemari.index'))->with('message', 'Berhasil hapus lemari');
    }
}
