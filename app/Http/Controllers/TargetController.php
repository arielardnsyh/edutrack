<?php

namespace App\Http\Controllers;

use App\Models\TargetAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    /**
     * Tampilkan data target akademik milik user yang sedang login.
     */
    public function index()
    {
        $target = TargetAkademik::where('user_id', Auth::id())->first();

        return view('target.index', compact('target'));
    }

    /**
     * Tampilkan form untuk membuat target akademik baru.
     */
    public function create()
    {
        // Jika user sudah punya target, redirect ke edit
        $existing = TargetAkademik::where('user_id', Auth::id())->first();
        if ($existing) {
            return redirect()->route('target.edit', $existing);
        }

        return view('target.create');
    }

    /**
     * Simpan data target akademik baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'target_ipk'   => 'required|numeric|min:0|max:4.00',
            'target_nilai'  => 'required|string|max:500',
        ]);

        TargetAkademik::create([
            'user_id'       => Auth::id(),
            'target_ipk'    => $validated['target_ipk'],
            'target_nilai'  => $validated['target_nilai'],
        ]);

        return redirect()->route('target.index')
            ->with('success', 'Target akademik berhasil disimpan!');
    }

    /**
     * Tampilkan form edit untuk target akademik tertentu.
     */
    public function edit(TargetAkademik $target)
    {
        // Pastikan data milik user yang sedang login
        if ($target->user_id !== Auth::id()) {
            abort(403);
        }

        return view('target.edit', compact('target'));
    }

    /**
     * Update data target akademik di database.
     */
    public function update(Request $request, TargetAkademik $target)
    {
        if ($target->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'target_ipk'   => 'required|numeric|min:0|max:4.00',
            'target_nilai'  => 'required|string|max:500',
        ]);

        $target->update($validated);

        return redirect()->route('target.index')
            ->with('success', 'Target akademik berhasil diperbarui!');
    }

    /**
     * Hapus data target akademik dari database.
     */
    public function destroy(TargetAkademik $target)
    {
        if ($target->user_id !== Auth::id()) {
            abort(403);
        }

        $target->delete();

        return redirect()->route('target.index')
            ->with('success', 'Target akademik berhasil dihapus!');
    }
}
