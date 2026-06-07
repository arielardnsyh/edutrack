<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Tampilkan semua notifikasi milik user yang sedang login,
     * diurutkan dari yang terbaru.
     */
    public function index()
    {
        $notifikasiList = Notifikasi::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('notifikasi.index', compact('notifikasiList'));
    }

    /**
     * Tandai notifikasi tertentu sebagai sudah dibaca ('read').
     */
    public function markAsRead(Notifikasi $notifikasi)
    {
        // Pastikan notifikasi milik user yang sedang login
        if ($notifikasi->user_id !== Auth::id()) {
            abort(403);
        }

        $notifikasi->update(['status' => 'read']);

        return redirect()->route('notifikasi.index')
            ->with('success', 'Notifikasi ditandai sudah dibaca.');
    }

    /**
     * Tandai semua notifikasi milik user sebagai sudah dibaca.
     */
    public function markAllAsRead()
    {
        Notifikasi::where('user_id', Auth::id())
            ->where('status', 'unread')
            ->update(['status' => 'read']);

        return redirect()->route('notifikasi.index')
            ->with('success', 'Semua notifikasi ditandai sudah dibaca.');
    }
}
