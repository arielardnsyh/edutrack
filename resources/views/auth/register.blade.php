<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftar ke EduTrack — Mulai tracking performa akademikmu secara mandiri dan gratis.">
    <title>Daftar Akun — EduTrack</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'et-bg':     '#0f172a',
                        'et-card':   '#1e293b',
                        'et-border': '#334155',
                        'et-accent': '#10b981',
                        'et-accent2':'#059669',
                        'et-text':   '#e2e8f0',
                        'et-muted':  '#94a3b8',
                        'et-error':  '#f87171',
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    animation: {
                        'fade-up': 'fadeUp 0.6s ease both',
                        'shake':   'shake 0.4s ease',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        shake: {
                            '0%,100%': { transform: 'translateX(0)' },
                            '20%':     { transform: 'translateX(-6px)' },
                            '40%':     { transform: 'translateX(6px)' },
                            '60%':     { transform: 'translateX(-4px)' },
                            '80%':     { transform: 'translateX(4px)' },
                        },
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #10b981; border-radius: 3px; }

        .orb {
            position: absolute;
            border-radius: 9999px;
            filter: blur(80px);
            opacity: 0.15;
            pointer-events: none;
            animation: drift 8s ease-in-out infinite alternate;
        }
        @keyframes drift {
            0%   { transform: translate(0,0) scale(1); }
            100% { transform: translate(20px,-15px) scale(1.06); }
        }

        .et-input {
            background: #0f172a;
            border: 1.5px solid #334155;
            color: #e2e8f0;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .et-input:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16,185,129,0.18);
        }
        .et-input::placeholder { color: #475569; }
        .et-input.is-invalid {
            border-color: #f87171;
            box-shadow: 0 0 0 3px rgba(248,113,113,0.15);
        }

        /* Password strength bar */
        .strength-bar {
            height: 3px;
            border-radius: 2px;
            transition: width 0.4s ease, background-color 0.4s ease;
        }

        .btn-submit {
            position: relative;
            overflow: hidden;
            transition: background-color 0.2s ease, box-shadow 0.3s ease, transform 0.15s ease;
        }
        .btn-submit:hover {
            box-shadow: 0 0 20px 4px rgba(16,185,129,0.40);
            transform: translateY(-1px);
        }
        .btn-submit:active { transform: translateY(0); }
        .btn-submit::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.10), transparent);
            transform: translateX(-100%);
            transition: transform 0.45s ease;
        }
        .btn-submit:hover::after { transform: translateX(100%); }
    </style>
</head>

<body class="bg-et-bg text-et-text font-sans antialiased min-h-screen flex flex-col">

    <!-- Background orbs -->
    <div class="orb w-96 h-96 bg-emerald-500 -top-24 -right-24" style="animation-delay:0s;"></div>
    <div class="orb w-80 h-80 bg-cyan-500  -bottom-20 -left-20" style="animation-delay:3s;"></div>

    <!-- Grid texture overlay -->
    <div class="fixed inset-0 opacity-[0.025] pointer-events-none"
         style="background-image:linear-gradient(#10b981 1px,transparent 1px),linear-gradient(90deg,#10b981 1px,transparent 1px);background-size:48px 48px;">
    </div>

    <!-- Top bar / Logo -->
    <div class="relative z-10 py-5 px-6">
        <a href="{{ route('home') }}" id="nav-logo" class="inline-flex items-center gap-2 group">
            <div class="w-8 h-8 rounded-xl bg-et-accent flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-200">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <span class="text-lg font-bold tracking-tight text-et-text">Edu<span class="text-et-accent">Track</span></span>
        </a>
    </div>

    <!-- ═══════════════════════════════
         REGISTER CARD
    ════════════════════════════════ -->
    <main class="relative z-10 flex-1 flex items-center justify-center px-4 py-8">

        <div class="w-full max-w-md animate-fade-up">

            <!-- Card -->
            <div class="bg-et-card border border-et-border rounded-3xl shadow-2xl p-8 sm:p-10">

                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 mb-4">
                        <svg class="w-8 h-8 text-et-accent" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-extrabold text-et-text">Buat Akun Baru</h1>
                    <p class="text-et-muted text-sm mt-1.5">Daftar gratis sebagai Mahasiswa EduTrack</p>

                    <!-- Role badge -->
                    <div class="inline-flex items-center gap-1.5 mt-3 bg-emerald-500/10 border border-emerald-500/25 rounded-full px-3 py-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-et-accent"></span>
                        <span class="text-xs text-et-accent font-medium">Role: Mahasiswa</span>
                    </div>
                </div>

                {{-- ── Error Alert ── --}}
                @if ($errors->any())
                    <div id="error-alert"
                         class="animate-shake mb-6 flex items-start gap-3 bg-red-500/10 border border-red-500/30 rounded-2xl px-4 py-3.5">
                        <svg class="w-5 h-5 text-et-error shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                        </svg>
                        <div>
                            <p class="text-et-error text-sm font-semibold mb-1">Terdapat Kesalahan Input</p>
                            <ul class="space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-400 text-xs flex items-start gap-1">
                                        <span class="mt-1 w-1 h-1 rounded-full bg-red-400 shrink-0"></span>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- ── Register Form ── --}}
                <form id="register-form" action="{{ route('register.attempt') }}" method="POST" novalidate>
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-et-muted mb-2">
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Nama Lengkap Kamu"
                                autocomplete="name"
                                required
                                class="et-input w-full pl-10 pr-4 py-3 rounded-xl text-sm {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            >
                        </div>
                        @error('name')
                            <p class="text-et-error text-xs mt-1.5 flex items-center gap-1">
                                <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-et-muted mb-2">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                autocomplete="email"
                                required
                                class="et-input w-full pl-10 pr-4 py-3 rounded-xl text-sm {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            >
                        </div>
                        @error('email')
                            <p class="text-et-error text-xs mt-1.5 flex items-center gap-1">
                                <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-et-muted mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Min. 8 karakter"
                                autocomplete="new-password"
                                required
                                class="et-input w-full pl-10 pr-12 py-3 rounded-xl text-sm {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            >
                            <button type="button" id="toggle-password"
                                    aria-label="Tampilkan password"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-500 hover:text-et-accent transition-colors">
                                <svg id="eye-open" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg id="eye-closed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Password Strength Indicator -->
                        <div class="mt-2 space-y-1.5">
                            <div class="flex gap-1.5">
                                <div id="str-bar-1" class="strength-bar flex-1 bg-et-border w-0"></div>
                                <div id="str-bar-2" class="strength-bar flex-1 bg-et-border w-0"></div>
                                <div id="str-bar-3" class="strength-bar flex-1 bg-et-border w-0"></div>
                                <div id="str-bar-4" class="strength-bar flex-1 bg-et-border w-0"></div>
                            </div>
                            <p id="str-label" class="text-xs text-et-muted hidden"></p>
                        </div>

                        @error('password')
                            <p class="text-et-error text-xs mt-1.5 flex items-center gap-1">
                                <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="mb-7">
                        <label for="password_confirmation" class="block text-sm font-medium text-et-muted mb-2">
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </span>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="Ulangi password kamu"
                                autocomplete="new-password"
                                required
                                class="et-input w-full pl-10 pr-12 py-3 rounded-xl text-sm"
                            >
                            <!-- Match indicator icon -->
                            <span id="match-icon" class="absolute inset-y-0 right-0 flex items-center pr-3.5 hidden">
                                <svg class="w-4 h-4 text-et-accent" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" id="btn-register"
                            class="btn-submit w-full bg-et-accent hover:bg-et-accent2 text-white font-bold py-3.5 rounded-xl text-sm tracking-wide flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span id="btn-text">Daftar Sekarang</span>
                        <svg id="btn-spinner" class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                        </svg>
                    </button>
                </form>

                <!-- Divider -->
                <div class="flex items-center gap-3 my-6">
                    <div class="flex-1 h-px bg-et-border"></div>
                    <span class="text-et-muted text-xs">sudah punya akun?</span>
                    <div class="flex-1 h-px bg-et-border"></div>
                </div>

                <!-- Login link -->
                <a href="{{ route('login') }}" id="goto-login"
                   class="flex items-center justify-center gap-2 border border-et-border hover:border-et-accent text-et-muted hover:text-et-accent font-semibold text-sm px-5 py-3 rounded-xl transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/>
                    </svg>
                    Masuk ke Akun
                </a>

            </div><!-- /card -->

            <!-- Footer note -->
            <p class="text-center text-et-muted text-xs mt-6">
                &copy; {{ date('Y') }} EduTrack. Pendaftaran gratis untuk mahasiswa Indonesia.
            </p>
        </div>
    </main>

    <script>
        /* ── Toggle show/hide password ── */
        const toggleBtn  = document.getElementById('toggle-password');
        const passwordEl = document.getElementById('password');
        const eyeOpen    = document.getElementById('eye-open');
        const eyeClosed  = document.getElementById('eye-closed');

        toggleBtn.addEventListener('click', () => {
            const isText = passwordEl.type === 'text';
            passwordEl.type = isText ? 'password' : 'text';
            eyeOpen.classList.toggle('hidden', !isText);
            eyeClosed.classList.toggle('hidden', isText);
        });

        /* ── Password strength indicator ── */
        const bars     = [1,2,3,4].map(i => document.getElementById(`str-bar-${i}`));
        const strLabel = document.getElementById('str-label');
        const levels   = [
            { color: 'bg-red-500',    label: 'Lemah',        text: 'text-red-400' },
            { color: 'bg-orange-400', label: 'Cukup',        text: 'text-orange-400' },
            { color: 'bg-yellow-400', label: 'Sedang',       text: 'text-yellow-400' },
            { color: 'bg-et-accent',  label: 'Kuat 💪',     text: 'text-et-accent' },
        ];

        passwordEl.addEventListener('input', () => {
            const val = passwordEl.value;
            let score = 0;
            if (val.length >= 8)              score++;
            if (/[A-Z]/.test(val))            score++;
            if (/[0-9]/.test(val))            score++;
            if (/[^A-Za-z0-9]/.test(val))     score++;

            bars.forEach((bar, i) => {
                bar.className = `strength-bar flex-1 ${i < score ? levels[score-1].color : 'bg-et-border'}`;
            });

            if (val.length > 0) {
                strLabel.classList.remove('hidden');
                strLabel.textContent = `Kekuatan password: ${levels[score-1]?.label ?? 'Sangat lemah'}`;
                strLabel.className   = `text-xs ${levels[score-1]?.text ?? 'text-red-400'}`;
            } else {
                strLabel.classList.add('hidden');
            }
        });

        /* ── Password match indicator ── */
        const confirmEl  = document.getElementById('password_confirmation');
        const matchIcon  = document.getElementById('match-icon');

        confirmEl.addEventListener('input', () => {
            const matched = confirmEl.value.length > 0 && confirmEl.value === passwordEl.value;
            matchIcon.classList.toggle('hidden', !matched);
            confirmEl.classList.toggle('is-invalid', confirmEl.value.length > 0 && !matched);
            confirmEl.style.borderColor = matched ? '#10b981' : '';
        });

        /* ── Loading spinner on submit ── */
        const form       = document.getElementById('register-form');
        const btnText    = document.getElementById('btn-text');
        const btnSpinner = document.getElementById('btn-spinner');
        const btnReg     = document.getElementById('btn-register');

        form.addEventListener('submit', () => {
            btnText.textContent = 'Memproses...';
            btnSpinner.classList.remove('hidden');
            btnReg.disabled = true;
            btnReg.classList.add('opacity-80', 'cursor-not-allowed');
        });

        /* ── Auto-dismiss error alert ── */
        const errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.transition = 'opacity 0.5s ease';
                errorAlert.style.opacity    = '0';
                setTimeout(() => errorAlert.remove(), 500);
            }, 6000);
        }
    </script>

</body>
</html>
