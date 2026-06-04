@extends('layouts.app')

@section('title', 'Target Akademik')
@section('page-title', 'Target Akademik')

@section('content')

{{-- ── Flash Messages ── --}}
@if (session('success'))
    <div id="flash-success"
         class="flex items-center gap-3 bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-sm font-medium px-4 py-3 rounded-xl mb-6">
        <svg class="w-5 h-5 flex-shrink-0 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span>{{ session('success') }}</span>
        <button onclick="document.getElementById('flash-success').remove()" class="ml-auto text-emerald-400 hover:text-emerald-200 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
@endif

{{-- ── Page Header ── --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h2 class="text-xl font-bold text-slate-100">Target Akademik</h2>
        <p class="text-sm text-slate-400 mt-0.5">Tetapkan dan pantau target akademikmu</p>
    </div>
    @if ($target)
        <a href="{{ route('target.edit', $target) }}" id="btn-edit-target"
           class="inline-flex items-center gap-2 border border-emerald-500/60 hover:border-emerald-400 hover:bg-emerald-500/10 text-emerald-400 hover:text-emerald-300 text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Target
        </a>
    @endif
</div>

@if ($target)
    {{-- ════════════════════════════════════════════
         TARGET CARDS
    ════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-6">

        {{-- Card: Target IPK --}}
        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 relative overflow-hidden hover:border-emerald-500/40 transition-colors duration-200">
            {{-- Decorative orb --}}
            <div class="absolute -top-8 -right-8 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Target IPK</p>
                            <p class="text-xs text-slate-500 mt-0.5">Indeks Prestasi Kumulatif</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-end gap-3 mb-4">
                    <p class="text-5xl font-extrabold text-slate-100 leading-none">{{ number_format($target->target_ipk, 2) }}</p>
                    <span class="text-lg text-slate-500 font-medium mb-1">/ 4.00</span>
                </div>

                {{-- Progress bar --}}
                @php $ipkPercent = min(($target->target_ipk / 4.00) * 100, 100); @endphp
                <div>
                    <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full transition-all duration-700"
                             style="width: {{ $ipkPercent }}%">
                        </div>
                    </div>
                    <div class="flex justify-between mt-1.5">
                        <p class="text-xs text-slate-500">Progress target</p>
                        <p class="text-xs text-emerald-400 font-semibold">{{ number_format($ipkPercent, 0) }}%</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card: Fokus Target Nilai --}}
        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 relative overflow-hidden hover:border-violet-500/40 transition-colors duration-200">
            {{-- Decorative orb --}}
            <div class="absolute -top-8 -right-8 w-32 h-32 bg-violet-500/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-violet-500/10 border border-violet-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Fokus Target Nilai</p>
                        <p class="text-xs text-slate-500 mt-0.5">Rencana & prioritas belajar</p>
                    </div>
                </div>

                <div class="bg-slate-900/60 border border-slate-700/50 rounded-xl p-4">
                    <p class="text-sm text-slate-200 leading-relaxed whitespace-pre-line">{{ $target->target_nilai }}</p>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Motivational Note ── --}}
    <div class="bg-gradient-to-r from-slate-800 to-slate-800/70 border border-slate-700 rounded-2xl p-5 flex items-start gap-4 relative overflow-hidden">
        <div class="absolute -bottom-6 -left-6 w-28 h-28 bg-emerald-500/8 rounded-full blur-2xl pointer-events-none"></div>
        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-200">Tips Motivasi</p>
            <p class="text-xs text-slate-400 mt-1 leading-relaxed">
                Konsistensi adalah kunci! Tinjau target akademikmu secara berkala dan sesuaikan strategimu. 
                Setiap langkah kecil yang kamu ambil membawamu lebih dekat ke tujuan. 🎯
            </p>
        </div>
    </div>

    {{-- ── Delete Target ── --}}
    <div class="mt-6 pt-6 border-t border-slate-700/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-400">Reset Target</p>
                <p class="text-xs text-slate-500 mt-0.5">Hapus target akademik saat ini dan buat ulang</p>
            </div>
            <form action="{{ route('target.destroy', $target) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus target akademik?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-red-400 border border-slate-600 hover:border-red-500/50 px-3 py-1.5 rounded-lg transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Hapus Target
                </button>
            </form>
        </div>
    </div>

@else
    {{-- ════════════════════════════════════════════
         EMPTY STATE
    ════════════════════════════════════════════ --}}
    <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
        <div class="flex flex-col items-center justify-center py-20 px-6 text-center relative overflow-hidden">
            {{-- Decorative orbs --}}
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-emerald-500/8 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-violet-500/8 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative">
                {{-- Icon --}}
                <div class="w-20 h-20 rounded-2xl bg-slate-700/60 border border-slate-600 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-200 mb-1">Belum Ada Target Akademik</h3>
                <p class="text-sm text-slate-500 mb-6 max-w-sm mx-auto leading-relaxed">
                    Tetapkan target IPK dan fokus belajarmu untuk memantau progres akademik secara lebih terarah.
                </p>

                <a href="{{ route('target.create') }}" id="btn-set-target"
                   class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white text-sm font-semibold px-6 py-3 rounded-xl transition-all duration-200 shadow-lg shadow-emerald-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Set Target Akademik
                </a>
            </div>
        </div>
    </div>
@endif

@endsection
