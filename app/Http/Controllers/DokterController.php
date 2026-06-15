<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $dokters = Dokter::with('poli')->latest();

        if ($request->keyword) {
            $dokters->where('nama_dokter', 'like', '%' . $request->keyword . '%')
                    ->orWhere('spesialis', 'like', '%' . $request->keyword . '%');
        }

        if ($request->poli) {
            $dokters->where('poli_id', $request->poli);
        }

        return view('dokter.index', [
            'title' => 'Dokter',
            'dokters' => $dokters->paginate(5)->withQueryString(),
            'polis' => Poli::groupBy('nama_poli')
              ->select('id', 'nama_poli')
              ->get()
        ]);
    }

    public function create()
    {
        return view('dokter.create', [
            'title' => 'Tambah Dokter',
            'polis' => Poli::all()
        ]);
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'poli_id' => 'required',
        'nama_dokter' => 'required',
        'spesialis' => 'required',
        'no_telepon' => 'required',
        'tanggal' => 'required|date',
    ]);

    Dokter::create($validated);

    return redirect()
        ->route('dokter.index')
        ->withSuccess('Data dokter berhasil ditambahkan');
    }

    public function show(Dokter $dokter)
    {
        return view('dokter.show', [
            'title' => 'Detail Dokter ' . $dokter->nama_dokter,
            'dokter' => $dokter
        ]);
    }

    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', [
            'title' => 'Edit Dokter',
            'dokter' => $dokter,
            'polis' => Poli::all()
        ]);
    }

    public function update(Request $request, Dokter $dokter)
    {
        $validated = $request->validate([
            'nama_dokter' => 'required|min:3|max:255',
            'spesialis' => 'required|max:255',
            'no_telepon' => 'required|max:20',
            'tanggal' => 'required|date',
            'poli_id' => 'required',
        ], [
            'nama_dokter.required' => 'Nama dokter wajib diisi',
            'spesialis.required' => 'Spesialis wajib diisi',
            'no_telepon.required' => 'Nomor telepon wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'poli_id.required' => 'Poli wajib dipilih',
        ]);

        $dokter->update($validated);

        return redirect()
            ->route('dokter.index')
            ->withSuccess('Data dokter berhasil diubah');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokter.index')
        ->withSuccess('Data dokter berhasil dihapus');
    }
}