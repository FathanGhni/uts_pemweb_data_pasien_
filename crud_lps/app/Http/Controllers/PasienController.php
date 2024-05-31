<?php

namespace App\Http\Controllers;

use App\Models\Pasienn;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasienn::all();
        return view('pasiens.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pasien'       => 'required|string',
            'umur'              => 'required|numeric',
            'jenis_kelamin'     => 'required|string|in:laki-laki,perempuan',
            'diagnosa'          => 'required|string',
            'waktu_kedatangan'  => 'required|string|min:2',
            'lama_kunjungan'    => 'required|string|min:2',
        ]);

        Pasienn::create($validatedData);

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pasien = Pasienn::findOrFail($id);
        return view('pasiens.show', compact('pasien'));
    }

    public function edit($id)
    {
        $pasien = Pasienn::findOrFail($id);
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_pasien'       => 'required|string',
            'umur'              => 'required|numeric',
            'jenis_kelamin'     => 'required|string|in:laki-laki,perempuan',
            'diagnosa'          => 'required|string',
            'waktu_kedatangan'  => 'required|string|min:2',
            'lama_kunjungan'    => 'required|string|min:2',
        ]);

        $pasien = Pasienn::findOrFail($id);
        $pasien->update($validatedData);

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = Pasienn::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
