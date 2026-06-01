<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EduTrack — Platform tracking akademik mandiri untuk mahasiswa. Pantau nilai, kehadiran, dan status akademikmu secara real-time.">
    <title>EduTrack — Kuasai Performa Akademikmu</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'et-bg':      '#0f172a', /* slate-900 */
                        'et-card':    '#1e293b', /* slate-800 */
                        'et-border':  '#334155', /* slate-700 */
                        'et-accent':  '#10b981', /* emerald-500 */
                        'et-accent2': '#059669', /* emerald-600 */
                        'et-text':    '#e2e8f0', /* slate-200  */
                        'et-muted':   '#94a3b8', /* slate-400  */
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    animation: {
                        'fade-up':   'fadeUp 0.7s ease both',
                        'fade-in':   'fadeIn 0.6s ease both',
                        'pulse-slow':'pulse 3s cubic-bezier(0.4,0,0.6,1) infinite',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(28px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeIn: {
                            '0%':   { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
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
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #10b981; border-radius: 3px; }

        /* ── Animated gradient orbs in hero ── */
        .orb {
            position: absolute;
            border-radius: 9999px;
            filter: blur(80px);
            opacity: 0.18;
            animation: drift 8s ease-in-out infinite alternate;
        }
        @keyframes drift {
            0%   { transform: translate(0, 0) scale(1); }
            100% { transform: translate(30px, -20px) scale(1.08); }
        }

        /* ── Glow border on card hover ── */
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 32px 0 rgba(16,185,129,0.20);
            border-color: #10b981;
        }

        /* ── Nav link underline animation ── */
        .nav-link {
            position: relative;
            transition: color 0.2s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 2px;
            background: #10b981;
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        .nav-link:hover { color: #10b981; }
        .nav-link:hover::after { width: 100%; }

        /* ── CTA button glow ── */
        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            box-shadow: 0 0 24px 4px rgba(16,185,129,0.45);
            transform: translateY(-2px);
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.12), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }
        .btn-primary:hover::after { transform: translateX(100%); }

        /* ── Stagger delay utilities ── */
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
    </style>
</head>
<body class="bg-et-bg text-et-text font-sans antialiased">

<!-- ═══════════════════════════════════════════
     NAVBAR
════════════════════════════════════════════ -->
<header id="navbar" class="fixed top-0 inset-x-0 z-50 transition-all duration-300">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" id="logo" class="flex items-center gap-2.5 group">
            <div class="w-9 h-9 rounded-xl bg-et-accent flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-200">
                <!-- Graduation cap icon -->
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <span class="text-xl font-bold text-et-text tracking-tight">Edu<span class="text-et-accent">Track</span></span>
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-8" aria-label="Navigasi Utama">
            <a href="#home"   class="nav-link text-et-muted text-sm font-medium">Home</a>
            <a href="#fitur"  class="nav-link text-et-muted text-sm font-medium">Fitur</a>
        </nav>

        <!-- Desktop CTA -->
        <div class="hidden md:block">
            <a href="/login" id="nav-login-btn"
               class="btn-primary inline-flex items-center gap-2 bg-et-accent hover:bg-et-accent2 text-white text-sm font-semibold px-5 py-2.5 rounded-xl">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/>
                </svg>
                Login
            </a>
        </div>

        <!-- Mobile Hamburger -->
        <button id="menu-toggle" aria-label="Buka menu navigasi"
                class="md:hidden p-2 rounded-lg text-et-muted hover:text-et-accent hover:bg-slate-800 transition-colors">
            <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
         class="md:hidden hidden bg-et-card border-t border-et-border px-6 py-4 space-y-3">
        <a href="#home"  class="block text-et-muted hover:text-et-accent py-2 text-sm font-medium transition-colors">Home</a>
        <a href="#fitur" class="block text-et-muted hover:text-et-accent py-2 text-sm font-medium transition-colors">Fitur</a>
        <a href="/login" id="mobile-login-btn"
           class="block text-center bg-et-accent hover:bg-et-accent2 text-white text-sm font-semibold px-5 py-2.5 rounded-xl mt-2 transition-colors">
            Login
        </a>
    </div>
</header>

<!-- ═══════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════════ -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">

    <!-- Background orbs -->
    <div class="orb w-96 h-96 bg-emerald-500 top-10 -left-24"  style="animation-delay:0s;"></div>
    <div class="orb w-80 h-80 bg-cyan-500   bottom-10 -right-20" style="animation-delay:2s;"></div>
    <div class="orb w-64 h-64 bg-violet-600 top-1/2 left-1/2"   style="animation-delay:4s; transform:translate(-50%,-50%);"></div>

    <!-- Grid texture overlay -->
    <div class="absolute inset-0 opacity-[0.03]"
         style="background-image:linear-gradient(#10b981 1px,transparent 1px),linear-gradient(90deg,#10b981 1px,transparent 1px);background-size:48px 48px;">
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">

        <!-- Badge -->
        <div class="animate-fade-in inline-flex items-center gap-2 bg-et-card border border-et-border rounded-full px-4 py-2 mb-8 text-xs font-medium text-et-accent shadow-lg">
            <span class="w-2 h-2 rounded-full bg-et-accent animate-pulse-slow"></span>
            Platform Akademik Mahasiswa Indonesia
        </div>

        <!-- Heading -->
        <h1 class="animate-fade-up delay-100 text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight tracking-tight mb-6">
            Kuasai Performa
            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400">
                Akademikmu Secara Mandiri
            </span>
        </h1>

        <!-- Description -->
        <p class="animate-fade-up delay-200 text-et-muted text-lg md:text-xl leading-relaxed max-w-2xl mx-auto mb-10">
            EduTrack adalah platform tracking akademik yang dirancang khusus untuk mahasiswa.
            Pantau nilai, kehadiran, dan status akademikmu — semua dalam satu dasbor yang cerdas dan intuitif.
        </p>

        <!-- CTA Buttons -->
        <div class="animate-fade-up delay-300 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/login" id="hero-cta-btn"
               class="btn-primary inline-flex items-center justify-center gap-2.5 bg-et-accent hover:bg-et-accent2 text-white font-bold text-base px-8 py-4 rounded-2xl shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Mulai Tracking Sekarang
            </a>
            <a href="#fitur" id="hero-feature-btn"
               class="inline-flex items-center justify-center gap-2 border border-et-border hover:border-et-accent text-et-muted hover:text-et-accent font-semibold text-base px-8 py-4 rounded-2xl transition-all duration-300">
                Lihat Fitur
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>

        <!-- Stats row -->
        <div class="animate-fade-up delay-400 mt-16 grid grid-cols-3 gap-6 max-w-lg mx-auto">
            <div class="text-center">
                <p class="text-2xl font-bold text-et-accent">4+</p>
                <p class="text-xs text-et-muted mt-1">Modul Fitur</p>
            </div>
            <div class="text-center border-x border-et-border">
                <p class="text-2xl font-bold text-et-accent">100%</p>
                <p class="text-xs text-et-muted mt-1">Gratis</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-et-accent">Real-time</p>
                <p class="text-xs text-et-muted mt-1">Pemantauan</p>
            </div>
        </div>
    </div>

    <!-- Scroll chevron -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce text-et-border">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     FEATURES SECTION
════════════════════════════════════════════ -->
<section id="fitur" class="py-24 px-6 relative">

    <!-- Section glow -->
    <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-et-accent to-transparent opacity-40"></div>

    <div class="max-w-6xl mx-auto">

        <!-- Section heading -->
        <div class="text-center mb-16">
            <span class="inline-block text-et-accent text-sm font-semibold tracking-widest uppercase mb-3">Fitur Unggulan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-et-text">Semua yang Kamu Butuhkan<br>dalam Satu Platform</h2>
            <p class="text-et-muted mt-4 max-w-xl mx-auto">Tiga modul inti yang dirancang untuk membantu mahasiswa memahami dan meningkatkan performa akademik mereka.</p>
        </div>

        <!-- Cards grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card 1: Pencatatan Nilai -->
            <div id="card-nilai"
                 class="feature-card bg-et-card border border-et-border rounded-2xl p-7 flex flex-col gap-5">
                <!-- Icon -->
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
                    <svg class="w-7 h-7 text-et-accent" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <!-- Content -->
                <div>
                    <h3 class="text-lg font-bold text-et-text mb-2">Pencatatan Nilai</h3>
                    <p class="text-et-muted text-sm leading-relaxed">
                        Simpan dan kelola nilai setiap mata kuliah per semester dengan mudah.
                        Rekap otomatis untuk membantu kamu memantau tren IP dari waktu ke waktu.
                    </p>
                </div>
                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mt-auto">
                    <span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-3 py-1 rounded-full">Per Semester</span>
                    <span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-3 py-1 rounded-full">Rekap Otomatis</span>
                </div>
            </div>

            <!-- Card 2: Monitoring Kehadiran -->
            <div id="card-kehadiran"
                 class="feature-card bg-et-card border border-et-border rounded-2xl p-7 flex flex-col gap-5 md:scale-[1.03]">
                <!-- Popular badge -->
                <div class="flex items-start justify-between">
                    <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center">
                        <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="text-xs bg-cyan-500/15 text-cyan-400 border border-cyan-500/25 px-2.5 py-1 rounded-full font-medium">Populer</span>
                </div>
                <!-- Content -->
                <div>
                    <h3 class="text-lg font-bold text-et-text mb-2">Monitoring Kehadiran</h3>
                    <p class="text-et-muted text-sm leading-relaxed">
                        Pantau persentase kehadiran setiap mata kuliah secara real-time.
                        Dapatkan peringatan dini sebelum kehadiranmu menyentuh batas minimum.
                    </p>
                </div>
                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mt-auto">
                    <span class="text-xs bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 px-3 py-1 rounded-full">Real-time</span>
                    <span class="text-xs bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 px-3 py-1 rounded-full">Peringatan Dini</span>
                </div>
            </div>

            <!-- Card 3: Analisis Status Akademik -->
            <div id="card-analisis"
                 class="feature-card bg-et-card border border-et-border rounded-2xl p-7 flex flex-col gap-5">
                <div class="w-14 h-14 rounded-2xl bg-violet-500/10 border border-violet-500/20 flex items-center justify-center">
                    <svg class="w-7 h-7 text-violet-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <!-- Content -->
                <div>
                    <h3 class="text-lg font-bold text-et-text mb-2">Analisis Status Akademik <span class="text-xs text-violet-400 font-semibold">(Otomatis)</span></h3>
                    <p class="text-et-muted text-sm leading-relaxed">
                        Sistem secara otomatis menganalisis data nilai dan kehadiranmu untuk memberikan gambaran lengkap status akademik dan rekomendasi yang actionable.
                    </p>
                </div>
                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mt-auto">
                    <span class="text-xs bg-violet-500/10 text-violet-400 border border-violet-500/20 px-3 py-1 rounded-full">AI-Assisted</span>
                    <span class="text-xs bg-violet-500/10 text-violet-400 border border-violet-500/20 px-3 py-1 rounded-full">Rekomendasi</span>
                </div>
            </div>

        </div><!-- /grid -->

        <!-- Bottom CTA -->
        <div class="mt-16 text-center">
            <p class="text-et-muted mb-5">Siap meningkatkan performa akademikmu?</p>
            <a href="/login" id="features-cta-btn"
               class="btn-primary inline-flex items-center gap-2.5 bg-et-accent hover:bg-et-accent2 text-white font-bold px-8 py-4 rounded-2xl shadow-xl text-sm">
                Daftar & Mulai Sekarang Gratis
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════
     FOOTER
════════════════════════════════════════════ -->
<footer class="border-t border-et-border py-8 px-6">
    <div class="absolute inset-x-0 h-px bg-gradient-to-r from-transparent via-et-accent to-transparent opacity-20"></div>
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Logo mini -->
        <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-lg bg-et-accent flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <span class="font-bold text-et-text text-sm">Edu<span class="text-et-accent">Track</span></span>
        </div>
        <!-- Copyright -->
        <p class="text-et-muted text-xs text-center">
            &copy; {{ date('Y') }} EduTrack.
        </p>
        <!-- Back to top -->
        <a href="#home" id="back-to-top"
           class="text-xs text-et-muted hover:text-et-accent transition-colors flex items-center gap-1">
            Kembali ke atas
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
            </svg>
        </a>
    </div>
</footer>

<!-- ═══════════════════════════════════════════
     JAVASCRIPT
════════════════════════════════════════════ -->
<script>
    /* ── Mobile menu toggle ── */
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen   = document.getElementById('icon-open');
    const iconClose  = document.getElementById('icon-close');

    menuToggle.addEventListener('click', () => {
        const isOpen = !mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden', isOpen);
        iconOpen.classList.toggle('hidden', !isOpen);
        iconClose.classList.toggle('hidden', isOpen);
    });

    /* Close mobile menu when a link is clicked */
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
        });
    });

    /* ── Navbar scroll glass effect ── */
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('bg-slate-900/80', 'backdrop-blur-md', 'border-b', 'border-slate-800', 'shadow-lg');
        } else {
            navbar.classList.remove('bg-slate-900/80', 'backdrop-blur-md', 'border-b', 'border-slate-800', 'shadow-lg');
        }
    }, { passive: true });

    /* ── Intersection Observer: animate cards on scroll ── */
    const observerOptions = { threshold: 0.15 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = entry.target.dataset.transform || 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.feature-card').forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(32px)';
        card.style.transition = `opacity 0.6s ease ${i * 0.12}s, transform 0.6s ease ${i * 0.12}s, box-shadow 0.3s ease, border-color 0.3s ease`;
        observer.observe(card);
    });
</script>

</body>
</html>
