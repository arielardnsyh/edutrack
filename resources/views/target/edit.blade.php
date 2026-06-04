@extends('layouts.app')

@section('title', 'Edit Target Akademik')
@section('page-title', 'Target Akademik — Edit Target')

@section('content')

<div class="max-w-2xl mx-auto">

    {{-- ── Breadcrumb ── --}}
    <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
        <a href="{{ route('target.index') }}" class="hover:text-emerald-400 transition-colors">Target Akademik</a>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-slate-300 font-medium">Edit Target</span>
    </nav>

    {{-- ── Card Form ── --}}
    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 lg:p-8">

        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-3 mb-1">
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-slate-100">Edit Target Akademik</h2>
                    <p class="text-xs text-slate-400">Perbarui target IPK dan fokus belajarmu</p>
                </div>
            </div>
        </div>

        {{-- Global Error Box --}}
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 rounded-xl px-4 py-3 mb-6">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm font-semibold text-red-300">Terdapat kesalahan pada input:</p>
                </div>
                <ul class="list-disc list-inside text-xs text-red-300/80 space-y-1 ml-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('target.update', $target) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Target IPK --}}
            <div>
                <label for="target_ipk" class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Target IPK <span class="text-red-400">*</span>
                </label>
                <input type="number"
                       id="target_ipk"
                       name="target_ipk"
                       value="{{ old('target_ipk', $target->target_ipk) }}"
                       placeholder="Contoh: 3.80"
                       step="0.01"
                       min="0"
                       max="4.00"
                       required
                       class="w-full bg-slate-900 border {{ $errors->has('target_ipk') ? 'border-red-500/60 ring-1 ring-red-500/30' : 'border-slate-600' }} text-slate-100 text-sm rounded-xl px-4 py-3 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/30 transition-all duration-200">
                @error('target_ipk')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1.5 text-xs text-slate-500">Masukkan target IPK dalam skala 0.00 – 4.00</p>
            </div>

            {{-- Target Nilai / Fokus Belajar --}}
            <div>
                <label for="target_nilai" class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Fokus Target Nilai / Rencana Belajar <span class="text-red-400">*</span>
                </label>
                <textarea id="target_nilai"
                          name="target_nilai"
                          rows="4"
                          placeholder="Contoh: Fokus meningkatkan nilai Algoritma dan Basis Data. Target minimal B+ untuk semua mata kuliah semester ini."
                          required
                          class="w-full bg-slate-900 border {{ $errors->has('target_nilai') ? 'border-red-500/60 ring-1 ring-red-500/30' : 'border-slate-600' }} text-slate-100 text-sm rounded-xl px-4 py-3 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/30 transition-all duration-200 resize-none">{{ old('target_nilai', $target->target_nilai) }}</textarea>
                @error('target_nilai')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1.5 text-xs text-slate-500">Tuliskan target dan rencana belajarmu untuk semester ini</p>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        id="btn-update-target"
                        class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition-all duration-200 shadow-lg shadow-emerald-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Perbarui Target
                </button>
                <a href="{{ route('target.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-medium text-slate-400 hover:text-slate-200 border border-slate-600 hover:border-slate-500 px-5 py-2.5 rounded-xl transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>

@endsection
