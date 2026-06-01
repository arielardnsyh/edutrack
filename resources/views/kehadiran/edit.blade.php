@extends('layouts.app')

@section('title', 'Edit Kehadiran')
@section('page-title', 'Academic Data — Edit Kehadiran')

@section('content')

<div class="max-w-2xl mx-auto">

    {{-- ── Breadcrumb ── --}}
    <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
        <a href="{{ route('kehadiran.index') }}" class="hover:text-emerald-400 transition-colors">Daftar Kehadiran</a>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-slate-300 font-medium">Edit Kehadiran</span>
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
                    <h2 class="text-lg font-bold text-slate-100">Edit Kehadiran</h2>
                    <p class="text-xs text-slate-400">Perbarui data kehadiran <span class="text-slate-300 font-medium">{{ $kehadiran->mata_kuliah }}</span></p>
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
        <form action="{{ route('kehadiran.update', $kehadiran) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Mata Kuliah --}}
            <div>
                <label for="mata_kuliah" class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Mata Kuliah <span class="text-red-400">*</span>
                </label>
                <input type="text"
                       id="mata_kuliah"
                       name="mata_kuliah"
                       value="{{ old('mata_kuliah', $kehadiran->mata_kuliah) }}"
                       placeholder="Contoh: Basis Data"
                       required
                       class="w-full bg-slate-900 border {{ $errors->has('mata_kuliah') ? 'border-red-500/60 ring-1 ring-red-500/30' : 'border-slate-600' }} text-slate-100 text-sm rounded-xl px-4 py-3 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/30 transition-all duration-200">
                @error('mata_kuliah')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Persentase Kehadiran --}}
            <div>
                <label for="persentase_kehadiran" class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Persentase Kehadiran <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <input type="number"
                           id="persentase_kehadiran"
                           name="persentase_kehadiran"
                           value="{{ old('persentase_kehadiran', $kehadiran->persentase_kehadiran) }}"
                           placeholder="0 — 100"
                           min="0"
                           max="100"
                           required
                           class="w-full bg-slate-900 border {{ $errors->has('persentase_kehadiran') ? 'border-red-500/60 ring-1 ring-red-500/30' : 'border-slate-600' }} text-slate-100 text-sm rounded-xl px-4 py-3 pr-10 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/30 transition-all duration-200">
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm font-medium pointer-events-none">%</span>
                </div>
                @error('persentase_kehadiran')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1.5 text-xs text-slate-500">Masukkan persentase kehadiran (0–100)</p>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        id="btn-update-kehadiran"
                        class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition-all duration-200 shadow-lg shadow-emerald-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Perbarui Kehadiran
                </button>
                <a href="{{ route('kehadiran.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-medium text-slate-400 hover:text-slate-200 border border-slate-600 hover:border-slate-500 px-5 py-2.5 rounded-xl transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>

@endsection
