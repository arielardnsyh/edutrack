@extends('layouts.app')

@section('title', 'Notifikasi')
@section('page-title', 'Notifikasi')

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
        <h2 class="text-xl font-bold text-slate-100">Notifikasi</h2>
        <p class="text-sm text-slate-400 mt-0.5">Pantau peringatan dan informasi akademikmu</p>
    </div>
    @if ($notifikasiList->where('status', 'unread')->count() > 0)
        <form action="{{ route('notifikasi.markAllAsRead') }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit"
                    class="inline-flex items-center gap-2 border border-emerald-500/60 hover:border-emerald-400 hover:bg-emerald-500/10 text-emerald-400 hover:text-emerald-300 text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                Tandai Semua Dibaca
            </button>
        </form>
    @endif
</div>

{{-- ── Notification List ── --}}
<div class="space-y-3">

    @forelse ($notifikasiList as $notif)
        @php
            $isUnread = $notif->status === 'unread';
        @endphp
        <div class="flex items-start gap-4 {{ $isUnread ? 'bg-slate-800 border-l-4 border-l-amber-500 border border-slate-700' : 'bg-slate-800/50 border border-slate-700/60' }} rounded-xl p-4 transition-all duration-200 {{ $isUnread ? 'hover:border-l-amber-400' : '' }}">

            {{-- Icon --}}
            <div class="w-10 h-10 rounded-xl {{ $isUnread ? 'bg-amber-500/10 border border-amber-500/20' : 'bg-slate-700/50 border border-slate-600/50' }} flex items-center justify-center flex-shrink-0 mt-0.5">
                @if ($isUnread)
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                @else
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                @endif
            </div>

            {{-- Content --}}
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-medium {{ $isUnread ? 'text-slate-100' : 'text-slate-400' }} leading-relaxed">
                            {{ $notif->pesan }}
                        </p>
                        <div class="flex items-center gap-3 mt-1.5">
                            <p class="text-xs text-slate-500">
                                {{ $notif->created_at->diffForHumans() }}
                            </p>
                            @if ($isUnread)
                                <span class="inline-flex items-center gap-1 text-[10px] font-semibold text-amber-400 bg-amber-400/10 border border-amber-400/20 px-2 py-0.5 rounded-full uppercase tracking-wide">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                    Baru
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-[10px] font-medium text-slate-500 bg-slate-700/50 px-2 py-0.5 rounded-full">
                                    Sudah dibaca
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Mark as read button --}}
                    @if ($isUnread)
                        <form action="{{ route('notifikasi.markAsRead', $notif) }}" method="POST" class="flex-shrink-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    title="Tandai sudah dibaca"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-emerald-400 border border-slate-600 hover:border-emerald-500/50 px-3 py-1.5 rounded-lg transition-all duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                Dibaca
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        </div>
    @empty
        {{-- Empty State --}}
        <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
            <div class="flex flex-col items-center justify-center py-16 px-6 text-center relative overflow-hidden">
                {{-- Decorative orbs --}}
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-emerald-500/8 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-violet-500/8 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative">
                    <div class="w-16 h-16 rounded-2xl bg-slate-700/60 border border-slate-600 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-300">Belum ada notifikasi</p>
                    <p class="text-xs text-slate-500 mt-1">Notifikasi peringatan akademik akan muncul di sini secara otomatis</p>
                </div>
            </div>
        </div>
    @endforelse

</div>

{{-- ── Footer Info ── --}}
@if ($notifikasiList->isNotEmpty())
    <div class="mt-4 pt-4 border-t border-slate-700/50">
        <div class="flex items-center justify-between">
            <p class="text-xs text-slate-500">
                Menampilkan {{ $notifikasiList->count() }} notifikasi
                · {{ $notifikasiList->where('status', 'unread')->count() }} belum dibaca
            </p>
        </div>
    </div>
@endif

@endsection
