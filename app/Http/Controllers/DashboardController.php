<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Nilai;
use App\Models\Notifikasi;
use App\Models\TargetAkademik;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard dengan data dinamis dan analisis performa rule-based.
     */
    public function index()
    {
        $userId = Auth::id();

        // ── Rata-rata nilai ──
        $rataNilai = Nilai::where('user_id', $userId)->avg('nilai') ?? 0;

        // ── Rata-rata kehadiran ──
        $rataKehadiran = Kehadiran::where('user_id', $userId)->avg('persentase_kehadiran') ?? 0;

        // ── Target akademik terbaru ──
        $target = TargetAkademik::where('user_id', $userId)->latest()->first();

        // ── Rule-Based Logic: Analisis Performa ──
        if ($rataNilai >= 75 && $rataKehadiran >= 80) {
            $status      = 'Aman';
            $warnaStatus = 'text-emerald-500';
        } elseif ($rataNilai >= 60 && $rataKehadiran >= 70) {
            $status      = 'Waspada';
            $warnaStatus = 'text-amber-500';
        } else {
            $status      = 'Bahaya';
            $warnaStatus = 'text-rose-500';
        }

        // ── Auto-Notifikasi: buat peringatan jika status Waspada/Bahaya ──
        if (in_array($status, ['Waspada', 'Bahaya'])) {
            // Cek apakah sudah ada notifikasi peringatan hari ini
            $sudahAdaHariIni = Notifikasi::where('user_id', $userId)
                ->where('pesan', 'like', '%[Peringatan Akademik]%')
                ->whereDate('created_at', Carbon::today())
                ->exists();

            if (! $sudahAdaHariIni) {
                $pesanNotif = $status === 'Bahaya'
                    ? '[Peringatan Akademik] Status kamu BAHAYA! Rata-rata nilai: ' . number_format($rataNilai, 1) . ', Kehadiran: ' . number_format($rataKehadiran, 0) . '%. Segera perbaiki performa akademikmu.'
                    : '[Peringatan Akademik] Status kamu WASPADA. Rata-rata nilai: ' . number_format($rataNilai, 1) . ', Kehadiran: ' . number_format($rataKehadiran, 0) . '%. Tingkatkan lagi agar tetap aman.';

                Notifikasi::create([
                    'user_id' => $userId,
                    'pesan'   => $pesanNotif,
                    'status'  => 'unread',
                ]);
            }
        }

        return view('dashboard.index', compact(
            'rataNilai',
            'rataKehadiran',
            'status',
            'warnaStatus',
            'target'
        ));
    }
}
