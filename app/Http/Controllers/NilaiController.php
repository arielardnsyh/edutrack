<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Tampilkan daftar nilai milik user yang sedang login.
     */
    public function index()
    {
        $nilaiList = Nilai::where('user_id', Auth::id())
            ->orderByDesc('semester')
            ->orderBy('mata_kuliah')
            ->get();

        return view('nilai.index', compact('nilaiList'));
    }

    /**
     * Tampilkan form untuk menambah nilai baru.
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Simpan data nilai baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'semester'    => 'required|string|max:20',
            'nilai'       => 'required|integer|min:0|max:100',
        ]);

        Nilai::create([
            'user_id'     => Auth::id(),
            'mata_kuliah' => $validated['mata_kuliah'],
            'semester'    => $validated['semester'],
            'nilai'       => $validated['nilai'],
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit untuk data nilai tertentu.
     */
    public function edit(Nilai $nilai)
    {
        // Pastikan data milik user yang sedang login
        if ($nilai->user_id !== Auth::id()) {
            abort(403);
        }

        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Update data nilai di database.
     */
    public function update(Request $request, Nilai $nilai)
    {
        if ($nilai->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'semester'    => 'required|string|max:20',
            'nilai'       => 'required|integer|min:0|max:100',
        ]);

        $nilai->update($validated);

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil diperbarui!');
    }

    /**
     * Hapus data nilai dari database.
     */
    public function destroy(Nilai $nilai)
    {
        if ($nilai->user_id !== Auth::id()) {
            abort(403);
        }

        $nilai->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil dihapus!');
    }
}
