<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun Siswa - SMK Digital</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eef6ff',
                            100: '#d9eaff',
                            200: '#bcdbff',
                            400: '#5ba2ff',
                            500: '#2b7fff',
                            600: '#1363df',
                            700: '#0c4bb7',
                            800: '#0f3f92',
                            900: '#113574',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 5s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-8px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0b0f19;
            color: #f1f5f9;
            overflow-x: hidden;
        }

        /* Ambient Glow Background Effect */
        .ambient-glow-1 {
            background: radial-gradient(circle at 50% 50%, rgba(37, 99, 235, 0.18) 0%, rgba(15, 23, 42, 0) 70%);
        }
        .ambient-glow-2 {
            background: radial-gradient(circle at 50% 50%, rgba(99, 102, 241, 0.15) 0%, rgba(15, 23, 42, 0) 65%);
        }

        /* Glassmorphism Panel */
        .glass-card {
            background: rgba(17, 24, 39, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 0 0 rgba(255, 255, 255, 0.08);
        }

        /* Input field smooth transition */
        .modern-input {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .modern-input:focus {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
        }

        /* Custom scrollbar for code viewer */
        pre::-webkit-scrollbar {
            height: 6px;
            width: 6px;
        }
        pre::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 999px;
        }
    </style>
</head>
<body class="min-h-screen relative flex flex-col justify-between selection:bg-brand-500 selection:text-white">

    <!-- Background Decorators -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="ambient-glow-1 absolute -top-40 -left-40 w-[600px] h-[600px] rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="ambient-glow-2 absolute -bottom-40 -right-40 w-[650px] h-[650px] rounded-full blur-3xl animate-pulse-slow"></div>
        <!-- Grid pattern overlay -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff05_1px,transparent_1px),linear-gradient(to_bottom,#ffffff05_1px,transparent_1px)] bg-[size:32px_32px]"></div>
    </div>

    <!-- Top Interactive Bar (Simulation Tools) -->
    <header class="relative z-10 w-full border-b border-white/5 bg-slate-900/60 backdrop-blur-md px-4 py-3">
        <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-between gap-3 text-xs">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                    Sistem Pendaftaran v2.4
                </span>
                <span class="text-slate-400 hidden sm:inline">• Portal Siswa Terpadu</span>
            </div>

            <!-- Demo Toolbar for Testing Alerts -->
            <div class="flex items-center gap-2">
                <span class="text-slate-400 hidden md:inline">Simulasi Feedback:</span>
                <button type="button" onclick="triggerAlert('sukses', 'Akun berhasil didaftarkan! Silakan masuk ke portal siswa.')" class="px-2.5 py-1 rounded-md bg-emerald-950/60 hover:bg-emerald-900/80 text-emerald-300 border border-emerald-800/40 transition">
                    Test Sukses
                </button>
                <button type="button" onclick="triggerAlert('gagal', 'Username sudah terdaftar! Gunakan username lain.')" class="px-2.5 py-1 rounded-md bg-rose-950/60 hover:bg-rose-900/80 text-rose-300 border border-rose-800/40 transition">
                    Test Gagal
                </button>
                <button type="button" onclick="togglePhpCodeModal()" class="px-2.5 py-1 rounded-md bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 transition flex items-center gap-1.5">
                    <i data-lucide="code" class="w-3.5 h-3.5"></i> Source PHP
                </button>
            </div>
        </div>
    </header>

    <main class="relative z-10 flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-[480px]">

            <!-- Main Card Container -->
            <div class="glass-card rounded-2xl p-6 sm:p-8 relative overflow-hidden transition-all duration-300">
                <!-- Top Brand Accents -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-cyan-400"></div>

                <!-- School & Portal Logo Header -->
                <div class="text-center mb-6">
                    <div class="inline-flex p-3 rounded-2xl bg-gradient-to-br from-brand-600/30 to-brand-800/20 border border-brand-500/30 shadow-lg shadow-brand-500/10 mb-3.5 animate-float">
                        <i data-lucide="graduation-cap" class="w-8 h-8 text-brand-400"></i>
                    </div>
                    <h1 class="text-2xl font-bold tracking-tight text-white mb-1">
                        Pendaftaran Akun
                    </h1>
                    <p class="text-sm text-slate-400">
                        Portal Layanan Akademik Siswa SMK Unggulan
                    </p>
                </div>

                <!-- Dynamic Alert Box (Mirip dengan PHP flash message) -->
                <div id="alertContainer" class="hidden mb-6 rounded-xl p-4 text-sm transition-all duration-300">
                    <div class="flex items-start gap-3">
                        <span id="alertIcon" class="mt-0.5 flex-shrink-0"></span>
                        <div class="flex-1">
                            <h4 id="alertTitle" class="font-semibold text-xs tracking-wider uppercase mb-0.5"></h4>
                            <p id="alertMessage" class="text-slate-200 text-sm leading-relaxed"></p>
                        </div>
                        <button type="button" onclick="closeAlert()" class="text-slate-400 hover:text-white transition p-1 rounded-lg">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Form Pendaftaran -->
                <form id="registrationForm" action="proses_daftar.php" method="POST" class="space-y-4" onsubmit="handleFormSubmit(event)">

                    <!-- Field: Username -->
                    <div class="space-y-1.5">
                        <label for="username" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            Username Siswa <span class="text-rose-400">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-brand-400 transition-colors">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </div>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                placeholder="misal: ahmad_rpl1" 
                                required 
                                autocomplete="off"
                                class="modern-input w-full pl-10 pr-4 py-2.5 bg-slate-900/80 border border-slate-700/80 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:bg-slate-900"
                            >
                        </div>
                        <p class="text-[11px] text-slate-400">Gunakan kombinasi huruf kecil, angka, atau garis bawah.</p>
                    </div>

                    <!-- Field: Nama Lengkap -->
                    <div class="space-y-1.5">
                        <label for="nama_lengkap" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            Nama Lengkap Siswa <span class="text-rose-400">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-brand-400 transition-colors">
                                <i data-lucide="badge-check" class="w-4 h-4"></i>
                            </div>
                            <input 
                                type="text" 
                                id="nama_lengkap" 
                                name="nama_lengkap" 
                                placeholder="Nama lengkap sesuai ijazah / rapor" 
                                required 
                                class="modern-input w-full pl-10 pr-4 py-2.5 bg-slate-900/80 border border-slate-700/80 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:bg-slate-900"
                            >
                        </div>
                    </div>

                    <!-- Field: Password -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                Kata Sandi <span class="text-rose-400">*</span>
                            </label>
                            <span id="strengthText" class="text-[11px] font-semibold text-slate-400">Minimal 8 karakter</span>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-brand-400 transition-colors">
                                <i data-lucide="lock" class="w-4 h-4"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="••••••••" 
                                required
                                oninput="checkPasswordStrength(this.value)"
                                class="modern-input w-full pl-10 pr-11 py-2.5 bg-slate-900/80 border border-slate-700/80 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:bg-slate-900"
                            >
                            <button 
                                type="button" 
                                onclick="togglePasswordVisibility('password', 'eyeIcon1')" 
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-200 transition"
                                title="Lihat Kata Sandi"
                            >
                                <i id="eyeIcon1" data-lucide="eye" class="w-4 h-4"></i>
                            </button>
                        </div>

                        <!-- Password Strength Indicator Bar -->
                        <div class="pt-1 space-y-1.5">
                            <div class="h-1.5 w-full bg-slate-800 rounded-full overflow-hidden flex gap-1 p-0.5">
                                <div id="meter1" class="h-full flex-1 rounded-full bg-transparent transition-all duration-300"></div>
                                <div id="meter2" class="h-full flex-1 rounded-full bg-transparent transition-all duration-300"></div>
                                <div id="meter3" class="h-full flex-1 rounded-full bg-transparent transition-all duration-300"></div>
                                <div id="meter4" class="h-full flex-1 rounded-full bg-transparent transition-all duration-300"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Field: Konfirmasi Password -->
                    <div class="space-y-1.5">
                        <label for="confirm_password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            Ulangi Kata Sandi <span class="text-rose-400">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-brand-400 transition-colors">
                                <i data-lucide="shield-check" class="w-4 h-4"></i>
                            </div>
                            <input 
                                type="password" 
                                id="confirm_password" 
                                name="confirm_password" 
                                placeholder="••••••••" 
                                required
                                oninput="validatePasswordMatch()"
                                class="modern-input w-full pl-10 pr-11 py-2.5 bg-slate-900/80 border border-slate-700/80 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:bg-slate-900"
                            >
                            <button 
                                type="button" 
                                onclick="togglePasswordVisibility('confirm_password', 'eyeIcon2')" 
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-200 transition"
                                title="Lihat Kata Sandi"
                            >
                                <i id="eyeIcon2" data-lucide="eye" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <div id="matchFeedback" class="text-[11px] hidden items-center gap-1"></div>
                    </div>

                    <!-- Terms agreement checkbox -->
                    <div class="pt-1 flex items-start gap-2.5">
                        <input 
                            type="checkbox" 
                            id="terms" 
                            required 
                            class="mt-1 w-4 h-4 rounded border-slate-700 bg-slate-900 text-brand-500 focus:ring-brand-500 focus:ring-offset-slate-900 cursor-pointer"
                        >
                        <label for="terms" class="text-xs text-slate-400 leading-relaxed cursor-pointer select-none">
                            Saya menyetujui ketentuan tata tertib digital dan penggunaan data akademik SMK.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            id="submitBtn" 
                            name="submit" 
                            class="w-full relative group overflow-hidden rounded-xl bg-gradient-to-r from-brand-600 to-indigo-600 hover:from-brand-500 hover:to-indigo-500 text-white font-semibold py-3 px-4 shadow-lg shadow-brand-500/25 transition-all duration-200 active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <span id="btnText" class="flex items-center gap-2">
                                <span>Daftar Sekarang</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                            <span id="btnLoader" class="hidden items-center gap-2">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Memproses Akun...</span>
                            </span>
                        </button>
                    </div>

                    <!-- Footer Link to Login -->
                    <p class="text-center text-xs text-slate-400 pt-2">
                        Sudah memiliki akun? 
                        <a href="login.php" class="text-brand-400 hover:text-brand-300 font-semibold underline underline-offset-4 decoration-brand-500/40 hover:decoration-brand-400 transition">
                            Masuk ke Portal
                        </a>
                    </p>
                </form>
            </div>

            <!-- Security Badges Footer -->
            <div class="mt-6 flex items-center justify-center gap-4 text-xs text-slate-500">
                <span class="flex items-center gap-1.5"><i data-lucide="lock" class="w-3.5 h-3.5"></i> Enkripsi SHA-256</span>
                <span>•</span>
                <span class="flex items-center gap-1.5"><i data-lucide="database" class="w-3.5 h-3.5"></i> Siap MySQLi / PDO</span>
            </div>
        </div>
    </main>

    <!-- Modal: View Native PHP File Code -->
    <div id="phpModal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-slate-900 border border-slate-700 rounded-2xl w-full max-w-3xl overflow-hidden shadow-2xl flex flex-col max-h-[85vh]">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-800 bg-slate-950/50">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                    <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                    <span class="ml-2 text-xs font-mono text-slate-300">register.php (Kode Produksi Lengkap)</span>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="copyPhpCode()" id="copyBtn" class="px-3 py-1.5 rounded-lg text-xs bg-brand-600/30 hover:bg-brand-600/50 text-brand-300 border border-brand-500/30 transition flex items-center gap-1.5">
                        <i data-lucide="copy" class="w-3.5 h-3.5"></i> Salin Kode PHP
                    </button>
                    <button onclick="togglePhpCodeModal()" class="text-slate-400 hover:text-white p-1 rounded-lg">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
            <div class="p-4 overflow-y-auto font-mono text-xs text-slate-300 bg-slate-950/80">
                <pre id="phpCodeBlock" class="whitespace-pre"><code>&lt;?php
// register.php - Tampilan Form Pendaftaran Akun Siswa SMK
// Versi Modern dengan Tailwind CSS &amp; Enkripsi Kata Sandi

$status = isset($_GET['status']) ? $_GET['status'] : '';
$pesan  = isset($_GET['pesan']) ? htmlspecialchars($_GET['pesan']) : '';
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Pendaftaran Akun - SMK Unggulan&lt;/title&gt;
    &lt;script src="https://cdn.tailwindcss.com"&gt;&lt;/script&gt;
    &lt;link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"&gt;
    &lt;script src="https://unpkg.com/lucide@latest"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body class="min-h-screen bg-slate-950 text-slate-100 flex items-center justify-center p-4 font-['Plus_Jakarta_Sans']"&gt;

    &lt;div class="w-full max-w-md bg-slate-900/90 border border-slate-800 rounded-2xl p-8 shadow-2xl backdrop-blur-xl"&gt;
        &lt;div class="text-center mb-6"&gt;
            &lt;div class="w-12 h-12 bg-blue-600/20 text-blue-400 border border-blue-500/30 rounded-2xl flex items-center justify-center mx-auto mb-3"&gt;
                &lt;i data-lucide="graduation-cap" class="w-6 h-6"&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;h2 class="text-2xl font-bold text-white tracking-tight"&gt;Pendaftaran Akun&lt;/h2&gt;
            &lt;p class="text-sm text-slate-400"&gt;Portal Akademik Siswa SMK&lt;/p&gt;
        &lt;/div&gt;

        &lt;?php if ($status === 'sukses'): ?&gt;
            &lt;div class="mb-5 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm flex items-center gap-3"&gt;
                &lt;i data-lucide="check-circle-2" class="w-5 h-5 flex-shrink-0"&gt;&lt;/i&gt;
                &lt;span&gt;&lt;?= $pesan; ?&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;?php elseif ($status === 'gagal'): ?&gt;
            &lt;div class="mb-5 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-sm flex items-center gap-3"&gt;
                &lt;i data-lucide="alert-circle" class="w-5 h-5 flex-shrink-0"&gt;&lt;/i&gt;
                &lt;span&gt;&lt;?= $pesan; ?&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;?php endif; ?&gt;

        &lt;form action="proses_daftar.php" method="POST" class="space-y-4"&gt;
            &lt;div&gt;
                &lt;label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5"&gt;Username&lt;/label&gt;
                &lt;input type="text" name="username" placeholder="Masukkan username" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-blue-500"&gt;
            &lt;/div&gt;
            &lt;div&gt;
                &lt;label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5"&gt;Nama Lengkap&lt;/label&gt;
                &lt;input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap siswa" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-blue-500"&gt;
            &lt;/div&gt;
            &lt;div&gt;
                &lt;label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5"&gt;Kata Sandi&lt;/label&gt;
                &lt;input type="password" name="password" placeholder="Minimal 8 karakter" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-blue-500"&gt;
            &lt;/div&gt;
            &lt;button type="submit" name="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-xl transition shadow-lg shadow-blue-600/30 cursor-pointer"&gt;
                Daftar Sekarang
            &lt;/button&gt;
        &lt;/form&gt;
    &lt;/div&gt;
    &lt;script&gt;lucide.createIcons();&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();

        // 1. Show / Hide Password Toggle
        function togglePasswordVisibility(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const iconElem = document.getElementById(iconId);
            if (!field) return;

            if (field.type === 'password') {
                field.type = 'text';
                iconElem.setAttribute('data-lucide', 'eye-off');
            } else {
                field.type = 'password';
                iconElem.setAttribute('data-lucide', 'eye');
            }
            lucide.createIcons();
        }

        // 2. Real-time Password Strength Meter
        function checkPasswordStrength(password) {
            const m1 = document.getElementById('meter1');
            const m2 = document.getElementById('meter2');
            const m3 = document.getElementById('meter3');
            const m4 = document.getElementById('meter4');
            const strengthText = document.getElementById('strengthText');

            const meters = [m1, m2, m3, m4];
            meters.forEach(m => m.className = 'h-full flex-1 rounded-full bg-slate-800 transition-all duration-300');

            if (!password) {
                strengthText.textContent = 'Minimal 8 karakter';
                strengthText.className = 'text-[11px] font-semibold text-slate-400';
                return;
            }

            let score = 0;
            if (password.length >= 6) score++;
            if (password.length >= 8) score++;
            if (/[0-9]/.test(password) && /[a-zA-Z]/.test(password)) score++;
            if (/[^a-zA-Z0-9]/.test(password)) score++;

            const colors = {
                1: { color: 'bg-rose-500', text: 'Terlalu Lemah', textCol: 'text-rose-400' },
                2: { color: 'bg-amber-500', text: 'Sedang', textCol: 'text-amber-400' },
                3: { color: 'bg-blue-500', text: 'Kuat', textCol: 'text-blue-400' },
                4: { color: 'bg-emerald-500', text: 'Sangat Aman & Kokoh', textCol: 'text-emerald-400' }
            };

            const active = colors[score] || colors[1];
            for (let i = 0; i < score; i++) {
                meters[i].className = `h-full flex-1 rounded-full ${active.color} transition-all duration-300 shadow-sm`;
            }
            strengthText.textContent = active.text;
            strengthText.className = `text-[11px] font-semibold ${active.textCol}`;

            validatePasswordMatch();
        }

        // 3. Confirm Password Match Checker
        function validatePasswordMatch() {
            const pwd = document.getElementById('password').value;
            const confirm = document.getElementById('confirm_password').value;
            const feedback = document.getElementById('matchFeedback');

            if (!confirm) {
                feedback.className = 'text-[11px] hidden items-center gap-1';
                return;
            }

            feedback.className = 'text-[11px] flex items-center gap-1 pt-1 font-medium';
            if (pwd === confirm) {
                feedback.innerHTML = '<i data-lucide="check" class="w-3.5 h-3.5 text-emerald-400"></i><span class="text-emerald-400">Kata sandi cocok</span>';
            } else {
                feedback.innerHTML = '<i data-lucide="alert-triangle" class="w-3.5 h-3.5 text-rose-400"></i><span class="text-rose-400">Kata sandi belum cocok</span>';
            }
            lucide.createIcons();
        }

        // 4. Alert Box Controller (Simulasi Flash message PHP $_GET['status'])
        function triggerAlert(type, message) {
            const container = document.getElementById('alertContainer');
            const title = document.getElementById('alertTitle');
            const msg = document.getElementById('alertMessage');
            const iconSpan = document.getElementById('alertIcon');

            container.classList.remove('hidden');

            if (type === 'sukses') {
                container.className = 'mb-6 rounded-xl p-4 text-sm border bg-emerald-500/10 border-emerald-500/25 text-emerald-400 transition-all duration-300';
                title.textContent = 'Pendaftaran Berhasil';
                title.className = 'font-semibold text-xs tracking-wider uppercase mb-0.5 text-emerald-300';
                iconSpan.innerHTML = '<i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400"></i>';
            } else {
                container.className = 'mb-6 rounded-xl p-4 text-sm border bg-rose-500/10 border-rose-500/25 text-rose-400 transition-all duration-300';
                title.textContent = 'Pendaftaran Terkendala';
                title.className = 'font-semibold text-xs tracking-wider uppercase mb-0.5 text-rose-300';
                iconSpan.innerHTML = '<i data-lucide="alert-octagon" class="w-5 h-5 text-rose-400"></i>';
            }

            msg.textContent = message;
            lucide.createIcons();
            container.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function closeAlert() {
            document.getElementById('alertContainer').classList.add('hidden');
        }

        // 5. Handle Submit Simulation with loading state
        function handleFormSubmit(e) {
            e.preventDefault();
            const pwd = document.getElementById('password').value;
            const confirm = document.getElementById('confirm_password').value;

            if (pwd !== confirm) {
                triggerAlert('gagal', 'Kata sandi konfirmasi tidak sesuai. Harap periksa kembali.');
                return;
            }

            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');
            const submitBtn = document.getElementById('submitBtn');

            btnText.classList.add('hidden');
            btnLoader.classList.remove('hidden');
            btnLoader.classList.add('flex');
            submitBtn.disabled = true;

            // Demo respon simulasi pendaftaran (30 detik untuk demonstrasi UI)
            setTimeout(() => {
                btnText.classList.remove('hidden');
                btnLoader.classList.add('hidden');
                btnLoader.classList.remove('flex');
                submitBtn.disabled = false;

                const nama = document.getElementById('nama_lengkap').value;
                triggerAlert('sukses', `Selamat ${nama}, akun Anda berhasil dibuat! Silakan masuk ke aplikasi.`);
                document.getElementById('registrationForm').reset();
                checkPasswordStrength('');
            }, 1200);
        }

        // 6. Source PHP modal & clipboard
        function togglePhpCodeModal() {
            const modal = document.getElementById('phpModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function copyPhpCode() {
            const code = document.getElementById('phpCodeBlock').innerText;
            const temp = document.createElement('textarea');
            temp.value = code;
            document.body.appendChild(temp);
            temp.select();
            document.execCommand('copy');
            document.body.removeChild(temp);

            const copyBtn = document.getElementById('copyBtn');
            const originalHtml = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i data-lucide="check" class="w-3.5 h-3.5"></i> Tersalin!';
            lucide.createIcons();
            setTimeout(() => {
                copyBtn.innerHTML = originalHtml;
                lucide.createIcons();
            }, 2000);
        }
    </script>
</body>
</html>