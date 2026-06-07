<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EduTrack — Dashboard Akademik Mahasiswa">
    <title>@yield('title', 'Dashboard') — EduTrack</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'et-bg':      '#0f172a',
                        'et-card':    '#1e293b',
                        'et-border':  '#334155',
                        'et-accent':  '#10b981',
                        'et-accent2': '#059669',
                        'et-text':    '#e2e8f0',
                        'et-muted':   '#94a3b8',
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                }
            }
        }
    </script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ── Custom scrollbar ── */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #10b981; border-radius: 4px; }

        /* ── Sidebar nav link hover ── */
        .nav-item {
            position: relative;
            transition: all 0.2s ease;
        }
        .nav-item:hover {
            background: rgba(16,185,129,0.08);
            color: #10b981;
        }
        .nav-item.active {
            background: rgba(16,185,129,0.12);
            color: #10b981;
            border-left: 3px solid #10b981;
        }
        .nav-item.active svg,
        .nav-item:hover svg {
            color: #10b981;
        }

        /* ── Tooltip for collapsed sidebar (future use) ── */
        .sidebar-tooltip {
            display: none;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased">

<div class="flex h-screen overflow-hidden">

    {{-- ═══════════════════════════════════════
         SIDEBAR KIRI
    ════════════════════════════════════════ --}}
    <aside id="sidebar"
           class="w-64 flex-shrink-0 bg-slate-800 border-r border-slate-700 flex flex-col h-full overflow-y-auto">

        {{-- ── Logo ── --}}
        <div class="px-6 py-5 border-b border-slate-700">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-xl bg-emerald-500 flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200 flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-bold text-slate-100 leading-tight">
                        Edu<span class="text-emerald-400">Track</span>
                    </p>
                    <p class="text-[10px] text-slate-400 font-medium tracking-wide">Academic Excellence</p>
                </div>
            </a>
        </div>

        {{-- ── Main Navigation ── --}}
        <nav class="flex-1 px-3 py-4 space-y-1" aria-label="Navigasi Utama">
            <p class="text-[10px] font-semibold text-slate-500 uppercase tracking-widest px-3 mb-3">Menu Utama</p>

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 pl-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
                @if(request()->routeIs('dashboard'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                @endif
            </a>

            {{-- Academic Data --}}
            <a href="{{ route('nilai.index') }}"
               class="nav-item {{ request()->routeIs('nilai.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
                <span>Academic Data</span>
            </a>

            {{-- Manajemen Kehadiran --}}
            <a href="{{ route('kehadiran.index') }}"
               class="nav-item {{ request()->routeIs('kehadiran.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Kehadiran</span>
                @if(request()->routeIs('kehadiran.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                @endif
            </a>

            {{-- Target Akademik --}}
            <a href="{{ route('target.index') }}"
               class="nav-item {{ request()->routeIs('target.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <span>Target Akademik</span>
                @if(request()->routeIs('target.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                @endif
            </a>

            {{-- Performance --}}
            <a href="#"
               class="nav-item {{ request()->routeIs('performance.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <span>Performance</span>
            </a>

            {{-- Reports --}}
            <a href="#"
               class="nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span>Reports</span>
            </a>
        </nav>

        {{-- ── Bottom Section ── --}}
        <div class="px-3 pb-4 border-t border-slate-700 pt-4 space-y-1">

            {{-- Settings --}}
            <a href="#"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Settings</span>
            </a>

            {{-- Help --}}
            <a href="#"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Help</span>
            </a>

            {{-- Profile Card --}}
            <div class="mt-3 bg-slate-700/50 border border-slate-600/50 rounded-xl p-3">
                <div class="flex items-center gap-3">
                    {{-- Avatar --}}
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center flex-shrink-0 shadow-md">
                        <span class="text-sm font-bold text-white">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </span>
                    </div>
                    {{-- Info --}}
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-slate-200 truncate">
                            {{ Auth::user()->name ?? 'Guest' }}
                        </p>
                        <p class="text-[11px] text-emerald-400 font-medium capitalize truncate">
                            {{ Auth::user()->role ?? 'Mahasiswa' }}
                        </p>
                    </div>
                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                title="Logout"
                                class="text-slate-500 hover:text-red-400 transition-colors duration-150">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </aside>

    {{-- ═══════════════════════════════════════
         MAIN CONTENT KANAN
    ════════════════════════════════════════ --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        {{-- ── Top Bar ── --}}
        <header class="h-14 flex-shrink-0 bg-slate-800/50 border-b border-slate-700 flex items-center justify-between px-6">
            <div class="flex items-center gap-3">
                {{-- Page title --}}
                <h1 class="text-sm font-semibold text-slate-200">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-3">
                {{-- Quick Action Buttons --}}
                <!-- <a href="{{ route('nilai.create') }}"
                   class="hidden sm:inline-flex items-center gap-1.5 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white text-xs font-semibold px-3 py-1.5 rounded-md transition-all duration-200 shadow-sm shadow-emerald-500/20">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Input Nilai
                </a>
                <a href="{{ route('kehadiran.create') }}"
                   class="hidden sm:inline-flex items-center gap-1.5 border border-emerald-500/60 hover:border-emerald-400 hover:bg-emerald-500/10 text-emerald-400 hover:text-emerald-300 text-xs font-semibold px-3 py-1.5 rounded-md transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Input Kehadiran
                </a> -->

                {{-- Divider --}}
                <div class="hidden sm:block w-px h-6 bg-slate-700"></div>

                {{-- Notification bell --}}
                @php
                    $unreadCount = \App\Models\Notifikasi::where('user_id', Auth::id())->where('status', 'unread')->count();
                @endphp
                <a href="{{ route('notifikasi.index') }}" class="relative text-slate-400 hover:text-slate-200 transition-colors" title="Notifikasi">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    @if ($unreadCount > 0)
                        <span class="absolute -top-1 -right-1 flex items-center justify-center min-w-[16px] h-4 bg-rose-500 text-white text-[10px] font-bold rounded-full px-1 shadow-sm shadow-rose-500/30">
                            {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                        </span>
                    @endif
                </a>
                {{-- Avatar mini --}}
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center shadow">
                    <span class="text-xs font-bold text-white">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </span>
                </div>
            </div>
        </header>

        {{-- ── Page Content ── --}}
        <main class="flex-1 overflow-y-auto bg-slate-900 p-6 lg:p-8">
            @yield('content')
        </main>

    </div>

</div>

@stack('scripts')
</body>
</html>
