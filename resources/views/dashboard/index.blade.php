@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- ════════════════════════════════════════════
     HEADER WELCOME CARD
════════════════════════════════════════════ --}}
<div class="bg-gradient-to-r from-slate-800 to-slate-800/70 border border-slate-700 rounded-2xl p-6 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 relative overflow-hidden">
    {{-- Decorative orb --}}
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none"></div>

    {{-- Greeting --}}
    <div>
        <p class="text-xs font-semibold text-emerald-400 uppercase tracking-widest mb-1">
            {{ now()->format('l, d F Y') }}
        </p>
        <h2 class="text-xl md:text-2xl font-bold text-slate-100">
            Welcome back, <span class="text-emerald-400">{{ Auth::user()->name }}</span>! 👋
        </h2>
        <p class="text-sm text-slate-400 mt-1">
            Terus semangat! Setiap langkah kecil membawamu lebih dekat ke tujuan akademikmu. 🎯
        </p>
    </div>
</div>

{{-- ════════════════════════════════════════════
     STAT CARDS — 4 KOLOM
════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    {{-- Card 1: Current GPA --}}
    <div id="card-gpa" class="bg-slate-800 border border-slate-700 rounded-2xl p-5 flex flex-col gap-3 hover:border-emerald-500/40 transition-colors duration-200">
        <div class="flex items-center justify-between">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Current GPA</p>
            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
        </div>
        <div class="flex items-end gap-3">
            <p class="text-4xl font-extrabold text-slate-100 leading-none">3.75</p>
            <span class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 px-2 py-0.5 rounded-full mb-0.5">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
                </svg>
                +0.05
            </span>
        </div>
        <p class="text-xs text-slate-500">Dibanding semester lalu</p>
    </div>

    {{-- Card 2: Attendance --}}
    <div id="card-attendance" class="bg-slate-800 border border-slate-700 rounded-2xl p-5 flex flex-col gap-3 hover:border-cyan-500/40 transition-colors duration-200">
        <div class="flex items-center justify-between">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Attendance</p>
            <div class="w-8 h-8 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center">
                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <div class="flex items-end gap-2">
            <p class="text-4xl font-extrabold text-slate-100 leading-none">92<span class="text-2xl text-slate-400 font-semibold">%</span></p>
        </div>
        {{-- Mini progress bar --}}
        <div>
            <div class="h-1.5 bg-slate-700 rounded-full overflow-hidden">
                <div class="h-full bg-cyan-400 rounded-full" style="width: 92%"></div>
            </div>
            <p class="text-xs text-slate-500 mt-1">Batas minimum: 75%</p>
        </div>
    </div>

    {{-- Card 3: Risk Status --}}
    <div id="card-risk" class="bg-slate-800 border border-slate-700 rounded-2xl p-5 flex flex-col gap-3 hover:border-emerald-500/40 transition-colors duration-200">
        <div class="flex items-center justify-between">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Active Risk Status</p>
            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse flex-shrink-0"></span>
            <p class="text-3xl font-extrabold text-emerald-400 leading-none">Aman</p>
        </div>
        <p class="text-xs text-slate-500">Tidak ada risiko akademik terdeteksi</p>
    </div>

    {{-- Card 4: Target Progress --}}
    <div id="card-progress" class="bg-slate-800 border border-slate-700 rounded-2xl p-5 flex flex-col gap-3 hover:border-violet-500/40 transition-colors duration-200">
        <div class="flex items-center justify-between">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Target Progress</p>
            <div class="w-8 h-8 rounded-lg bg-violet-500/10 border border-violet-500/20 flex items-center justify-center">
                <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </div>
        <p class="text-4xl font-extrabold text-slate-100 leading-none">85<span class="text-2xl text-slate-400 font-semibold">%</span></p>
        {{-- Progress Bar --}}
        <div>
            <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full transition-all duration-700"
                     style="width: 85%">
                </div>
            </div>
            <div class="flex justify-between mt-1">
                <p class="text-xs text-slate-500">Target: IPK 3.80</p>
                <p class="text-xs text-emerald-400 font-medium">85%</p>
            </div>
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════
     BOTTOM GRID — 2/3 | 1/3
════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- ── Kolom Kiri 2/3: GPA Trend Chart ── --}}
    <div id="card-gpa-trend" class="lg:col-span-2 bg-slate-800 border border-slate-700 rounded-2xl p-6 flex flex-col">
        {{-- Card Header --}}
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="text-sm font-bold text-slate-200">GPA Trend</h3>
                <p class="text-xs text-slate-500 mt-0.5">Perkembangan IP per semester</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 text-xs text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 px-2.5 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Semester ini
                </span>
            </div>
        </div>

        {{-- Chart Placeholder --}}
        <div class="flex-1 min-h-[200px] relative rounded-xl overflow-hidden bg-slate-900/60 border border-slate-700/50 flex items-center justify-center">
            {{-- Grid lines --}}
            <div class="absolute inset-0 opacity-30"
                 style="background-image:
                    linear-gradient(rgba(51,65,85,0.8) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(51,65,85,0.8) 1px, transparent 1px);
                    background-size: 48px 40px;">
            </div>
            {{-- Placeholder text --}}
            <div class="relative text-center">
                <div class="w-14 h-14 rounded-2xl bg-slate-700/60 border border-slate-600 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-7 h-7 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-slate-400">Grafik Trend Nilai</p>
                <p class="text-xs text-slate-600 mt-1">Data akan tampil setelah nilai diinput</p>
            </div>
        </div>

        {{-- Legend --}}
        <div class="flex items-center gap-6 mt-4">
            <div class="flex items-center gap-2">
                <div class="w-3 h-0.5 bg-emerald-400 rounded"></div>
                <span class="text-xs text-slate-500">IP Semester</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-0.5 bg-cyan-400 rounded"></div>
                <span class="text-xs text-slate-500">IPK Kumulatif</span>
            </div>
        </div>
    </div>

    {{-- ── Kolom Kanan 1/3: 2 Cards vertikal ── --}}
    <div class="flex flex-col gap-5">

        {{-- Card: Early Warnings --}}
        <div id="card-warnings" class="bg-slate-800 border border-slate-700 rounded-2xl p-5 flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-200">Early Warnings</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Peringatan akademik aktif</p>
                </div>
                <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
            </div>

            {{-- No warnings state --}}
            <div class="flex flex-col items-center justify-center py-4 text-center">
                <div class="w-12 h-12 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-emerald-400">No active warnings</p>
                <p class="text-xs text-slate-500 mt-1">Performa akademikmu dalam kondisi baik</p>
            </div>
        </div>

        {{-- Card: Recent Activity --}}
        <div id="card-activity" class="bg-slate-800 border border-slate-700 rounded-2xl p-5 flex flex-col gap-4 flex-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-200">Recent Activity</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Aktivitas terbaru</p>
                </div>
                <a href="#" class="text-xs text-emerald-400 hover:text-emerald-300 transition-colors font-medium">
                    Lihat semua
                </a>
            </div>

            {{-- Activity list --}}
            <ul class="space-y-3">
                {{-- Activity 1 --}}
                <li class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-slate-200">Nilai Algoritma diinput</p>
                        <p class="text-xs text-slate-500">Nilai A · Semester 4</p>
                        <p class="text-xs text-slate-600 mt-0.5">2 jam yang lalu</p>
                    </div>
                </li>

                {{-- Activity 2 --}}
                <li class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-slate-200">Kehadiran Basis Data diperbarui</p>
                        <p class="text-xs text-slate-500">Hadir · 14/15 pertemuan</p>
                        <p class="text-xs text-slate-600 mt-0.5">1 hari yang lalu</p>
                    </div>
                </li>
            </ul>
        </div>

    </div>{{-- /kolom kanan --}}

</div>{{-- /bottom grid --}}

@endsection
