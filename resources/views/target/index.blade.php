@extends('layouts.app')

@section('title', 'Target Akademik')
@section('page-title', 'Target Akademik')

@section('content')

{{-- ── Flash Messages ── --}}
@if (session('success'))
    <div id="flash-success"
         class="flex items-center gap-3 bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-sm font-medium px-4 py-3 rounded-xl mb-6 animate-fade-in">
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

{{-- ── Validation Errors ── --}}
@if ($errors->any())
    <div class="bg-red-500/15 border border-red-500/30 text-red-300 text-sm px-4 py-3 rounded-xl mb-6">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ── Page Header ── --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h2 class="text-xl font-bold text-slate-100">Target Akademik</h2>
        <p class="text-sm text-slate-400 mt-0.5">Tetapkan target IPK untuk memantau progres akademikmu</p>
    </div>
</div>

{{-- ── Current Target Card ── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Card: Target IPK Saat Ini --}}
    <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700/60">
            <h3 class="text-sm font-semibold text-slate-300 flex items-center gap-2">
                <svg class="w-[18px] h-[18px] text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Target IPK Saat Ini
            </h3>
        </div>
        <div class="p-6 flex flex-col items-center justify-center min-h-[180px]">
            @if ($target)
                <div class="relative">
                    {{-- Glowing ring --}}
                    <div class="w-28 h-28 rounded-full border-4 border-emerald-500/30 flex items-center justify-center relative">
                        <div class="absolute inset-0 rounded-full bg-emerald-500/5"></div>
                        <span class="text-4xl font-extrabold text-emerald-400 tracking-tight">
                            {{ number_format($target->target_ipk, 2) }}
                        </span>
                    </div>
                </div>
                <p class="mt-4 text-sm text-slate-400">Target Indeks Prestasi Kumulatif</p>
                @if ($target->target_nilai)
                    <span class="mt-2 inline-flex items-center text-xs font-semibold bg-slate-700 border border-slate-600 text-slate-300 px-3 py-1 rounded-full">
                        Target Nilai: {{ $target->target_nilai }}
                    </span>
                @endif
                <p class="mt-3 text-[11px] text-slate-500">
                    Terakhir diperbarui: {{ $target->updated_at->translatedFormat('d M Y, H:i') }}
                </p>
            @else
                {{-- Empty State --}}
                <div class="flex flex-col items-center text-center">
                    <div class="w-14 h-14 rounded-2xl bg-slate-700/60 border border-slate-600 flex items-center justify-center mb-3">
                        <svg class="w-7 h-7 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-300">Belum ada target</p>
                    <p class="text-xs text-slate-500 mt-1">Atur target IPK-mu melalui form di samping</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Card: Form Input Target --}}
    <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700/60">
            <h3 class="text-sm font-semibold text-slate-300 flex items-center gap-2">
                <svg class="w-[18px] h-[18px] text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                {{ $target ? 'Perbarui Target' : 'Tetapkan Target' }}
            </h3>
        </div>
        <div class="p-6">
            <form action="{{ route('target.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Input Target IPK --}}
                <div>
                    <label for="target_ipk" class="block text-sm font-medium text-slate-300 mb-2">
                        Target IPK <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <input type="number"
                               id="target_ipk"
                               name="target_ipk"
                               step="0.01"
                               min="0"
                               max="4"
                               placeholder="Contoh: 3.80"
                               value="{{ old('target_ipk', $target->target_ipk ?? '') }}"
                               class="w-full bg-slate-700/50 border border-slate-600 text-slate-100 placeholder-slate-500 text-sm font-medium rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-200"
                               required>
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <span class="text-xs text-slate-500 font-medium">/ 4.00</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-500 mt-1.5">Masukkan angka desimal antara 0.00 — 4.00</p>
                </div>

                {{-- Input Target Nilai --}}
                <div>
                    <label for="target_nilai" class="block text-sm font-medium text-slate-300 mb-2">
                        Target Nilai Huruf <span class="text-slate-500">(opsional)</span>
                    </label>
                    <select id="target_nilai"
                            name="target_nilai"
                            class="w-full bg-slate-700/50 border border-slate-600 text-slate-100 text-sm font-medium rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-200">
                        @php
                            $currentNilai = old('target_nilai', $target->target_nilai ?? 'A');
                        @endphp
                        <option value="A" {{ $currentNilai === 'A' ? 'selected' : '' }}>A (Sangat Baik)</option>
                        <option value="A-" {{ $currentNilai === 'A-' ? 'selected' : '' }}>A- (Hampir Sangat Baik)</option>
                        <option value="B+" {{ $currentNilai === 'B+' ? 'selected' : '' }}>B+ (Lebih dari Baik)</option>
                        <option value="B" {{ $currentNilai === 'B' ? 'selected' : '' }}>B (Baik)</option>
                        <option value="B-" {{ $currentNilai === 'B-' ? 'selected' : '' }}>B- (Hampir Baik)</option>
                        <option value="C+" {{ $currentNilai === 'C+' ? 'selected' : '' }}>C+ (Lebih dari Cukup)</option>
                        <option value="C" {{ $currentNilai === 'C' ? 'selected' : '' }}>C (Cukup)</option>
                    </select>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        id="btn-simpan-target"
                        class="w-full inline-flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Target
                </button>
            </form>
        </div>
    </div>

</div>

{{-- ── Motivational Tips ── --}}
<div class="mt-8 bg-slate-800/50 border border-slate-700/50 rounded-2xl p-5">
    <h4 class="text-sm font-semibold text-slate-300 mb-3 flex items-center gap-2">
        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
        </svg>
        Tips Meraih Target IPK
    </h4>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <span class="text-sm">📚</span>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-300">Konsistensi Belajar</p>
                <p class="text-[11px] text-slate-500 mt-0.5">Buat jadwal belajar harian yang teratur dan disiplin</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <span class="text-sm">✅</span>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-300">Kehadiran 100%</p>
                <p class="text-[11px] text-slate-500 mt-0.5">Hadiri semua perkuliahan untuk pemahaman maksimal</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-amber-500/10 border border-amber-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <span class="text-sm">🎯</span>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-300">Review Berkala</p>
                <p class="text-[11px] text-slate-500 mt-0.5">Evaluasi progres setiap minggu dan sesuaikan strategi</p>
            </div>
        </div>
    </div>
</div>

@endsection
