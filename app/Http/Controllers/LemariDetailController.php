<?php

namespace App\Http\Controllers;

use App\Models\LemariDetail;
use Illuminate\Http\Request;

class LemariDetailController extends Controller
{
    public function create()
    {
        return view('pages.lemari-detail.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lemari_id' => 'required',
            'nomor' => 'required'
        ]);

        $data['status'] = 'Tersedia';
        LemariDetail::create($data);

        return redirect(route('lemari.show', $data['lemari_id']))->with('message', 'Berhasil menambah detail lemari');
    }

    public function edit(LemariDetail $lemariDetail)
    {
        return view('pages.lemari-detail.edit', compact('lemariDetail'));
    }

    public function update(Request $request, LemariDetail $lemariDetail)
    {
        $data = $request->validate([
            'nomor' => 'required',
        ]);

        $lemariDetail->update($data);

        return redirect(route('lemari.show', $request->get('lemari_id')))->with('message', 'Berhasil edit detail lemari');
    }

    public function destroy(LemariDetail $lemariDetail)
    {
        $lemariDetail->delete();
        return redirect(route('lemari.show', request()->get('lemari_id')))->with('message', 'Berhasil hapus detail lemari');
    }
}
