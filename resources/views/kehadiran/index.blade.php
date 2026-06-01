@extends('layouts.app')

@section('title', 'Manajemen Kehadiran')
@section('page-title', 'Academic Data — Kehadiran')

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
        <h2 class="text-xl font-bold text-slate-100">Daftar Kehadiran</h2>
        <p class="text-sm text-slate-400 mt-0.5">Kelola data persentase kehadiran per mata kuliah</p>
    </div>
    <a href="{{ route('kehadiran.create') }}" id="btn-tambah-kehadiran"
       class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-lg shadow-emerald-500/20">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Kehadiran
    </a>
</div>

{{-- ── Tabel Kehadiran ── --}}
<div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">

    @if ($kehadiranList->isEmpty())
        {{-- Empty State --}}
        <div class="flex flex-col items-center justify-center py-16 px-6 text-center">
            <div class="w-16 h-16 rounded-2xl bg-slate-700/60 border border-slate-600 flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-sm font-semibold text-slate-300">Belum ada data kehadiran</p>
            <p class="text-xs text-slate-500 mt-1 mb-5">Mulai tambahkan data kehadiran mata kuliahmu</p>
            <a href="{{ route('kehadiran.create') }}"
               class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-semibold px-4 py-2 rounded-xl transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Data Pertama
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-slate-700 bg-slate-800/80">
                        <th class="px-5 py-3.5 text-xs font-semibold text-slate-400 uppercase tracking-widest">No</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-slate-400 uppercase tracking-widest">Mata Kuliah</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-slate-400 uppercase tracking-widest">Persentase Kehadiran</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/60">
                    @foreach ($kehadiranList as $index => $item)
                        <tr class="hover:bg-slate-700/30 transition-colors duration-150">
                            <td class="px-5 py-3.5 text-slate-500 font-medium">{{ $index + 1 }}</td>
                            <td class="px-5 py-3.5 text-slate-200 font-medium">{{ $item->mata_kuliah }}</td>
                            <td class="px-5 py-3.5">
                                @php
                                    $persen = $item->persentase_kehadiran;
                                    if ($persen >= 80) {
                                        $barColor = 'bg-emerald-400';
                                        $badgeColor = 'bg-emerald-500/15 text-emerald-400 border-emerald-500/25';
                                    } elseif ($persen >= 60) {
                                        $barColor = 'bg-amber-400';
                                        $badgeColor = 'bg-amber-500/15 text-amber-400 border-amber-500/25';
                                    } else {
                                        $barColor = 'bg-red-400';
                                        $badgeColor = 'bg-red-500/15 text-red-400 border-red-500/25';
                                    }
                                @endphp
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex items-center text-xs font-bold {{ $badgeColor }} border px-2.5 py-1 rounded-full min-w-[52px] justify-center">
                                        {{ $persen }}%
                                    </span>
                                    <div class="flex-1 max-w-[120px] h-1.5 bg-slate-700 rounded-full overflow-hidden">
                                        <div class="h-full {{ $barColor }} rounded-full transition-all duration-500" style="width: {{ $persen }}%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('kehadiran.edit', $item) }}"
                                       class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-emerald-400 border border-slate-600 hover:border-emerald-500/50 px-3 py-1.5 rounded-lg transition-all duration-200"
                                       title="Edit kehadiran">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    {{-- Delete --}}
                                    <form action="{{ route('kehadiran.destroy', $item) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data kehadiran {{ $item->mata_kuliah }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-red-400 border border-slate-600 hover:border-red-500/50 px-3 py-1.5 rounded-lg transition-all duration-200"
                                                title="Hapus kehadiran">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Footer Info --}}
        <div class="px-5 py-3 border-t border-slate-700/60 bg-slate-800/50">
            <p class="text-xs text-slate-500">Menampilkan {{ $kehadiranList->count() }} data kehadiran</p>
        </div>
    @endif

</div>

@endsection
