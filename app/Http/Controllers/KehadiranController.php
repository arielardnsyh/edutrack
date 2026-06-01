<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    /**
     * Tampilkan daftar kehadiran milik user yang sedang login.
     */
    public function index()
    {
        $kehadiranList = Kehadiran::where('user_id', Auth::id())
            ->orderBy('mata_kuliah')
            ->get();

        return view('kehadiran.index', compact('kehadiranList'));
    }

    /**
     * Tampilkan form untuk menambah data kehadiran baru.
     */
    public function create()
    {
        return view('kehadiran.create');
    }

    /**
     * Simpan data kehadiran baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_kuliah'          => 'required|string|max:255',
            'persentase_kehadiran' => 'required|integer|min:0|max:100',
        ]);

        Kehadiran::create([
            'user_id'              => Auth::id(),
            'mata_kuliah'          => $validated['mata_kuliah'],
            'persentase_kehadiran' => $validated['persentase_kehadiran'],
        ]);

        return redirect()->route('kehadiran.index')
            ->with('success', 'Data kehadiran berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit untuk data kehadiran tertentu.
     */
    public function edit(Kehadiran $kehadiran)
    {
        if ($kehadiran->user_id !== Auth::id()) {
            abort(403);
        }

        return view('kehadiran.edit', compact('kehadiran'));
    }

    /**
     * Update data kehadiran di database.
     */
    public function update(Request $request, Kehadiran $kehadiran)
    {
        if ($kehadiran->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'mata_kuliah'          => 'required|string|max:255',
            'persentase_kehadiran' => 'required|integer|min:0|max:100',
        ]);

        $kehadiran->update($validated);

        return redirect()->route('kehadiran.index')
            ->with('success', 'Data kehadiran berhasil diperbarui!');
    }

    /**
     * Hapus data kehadiran dari database.
     */
    public function destroy(Kehadiran $kehadiran)
    {
        if ($kehadiran->user_id !== Auth::id()) {
            abort(403);
        }

        $kehadiran->delete();

        return redirect()->route('kehadiran.index')
            ->with('success', 'Data kehadiran berhasil dihapus!');
    }
}
