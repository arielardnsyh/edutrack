<?php

namespace App\Http\Controllers;

use App\Models\TargetAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TargetAkademikController extends Controller
{
    /**
     * Tampilkan halaman Target Akademik milik user yang sedang login.
     */
    public function index()
    {
        $target = TargetAkademik::where('user_id', Auth::id())->first();

        return view('target.index', compact('target'));
    }

    /**
     * Simpan atau update (upsert) data Target IPK mahasiswa.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'target_ipk'  => 'required|numeric|min:0|max:4',
            'target_nilai' => 'nullable|string|max:5',
        ]);

        TargetAkademik::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'target_ipk'   => $validated['target_ipk'],
                'target_nilai' => $validated['target_nilai'] ?? 'A',
            ]
        );

        return redirect()->route('target.index')
            ->with('success', 'Target akademik berhasil disimpan!');
    }
}
