<!DOCTYPE html>
<html lang="id" class="light-style layout-menu-fixed">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Sneat Admin CMS SMK Wikrama 1 Garut</title>

    <!-- Sneat Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/wikrama-logo-1.png" />

    <!-- Google Fonts: Public Sans (Official Sneat Font) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Boxicons CDN (Official Sneat Icons) -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- RemixIcon CDN (For inner views compatibility) -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sneat: {
                            primary: '#696cff',
                            secondary: '#8592a3',
                            success: '#71dd37',
                            danger: '#ff3e1d',
                            warning: '#ffab00',
                            info: '#03c3ec',
                            dark: '#233446',
                            body: '#f5f5f9',
                            muted: '#a1acb8'
                        },
                        wikrama: {
                            blue: '#1F3984',
                            dark: '#001E42',
                            gold: '#FFF500',
                            orange: '#FF7A00',
                            light: '#EFF3FF'
                        }
                    },
                    fontFamily: {
                        sans: ['"Public Sans"', 'sans-serif'],
                        heading: ['"Public Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Sneat Core Styles -->
    <style>
        :root {
            --bs-primary: #696cff;
            --bs-primary-rgb: 105, 108, 255;
            --bs-body-bg: #f5f5f9;
        }
        body {
            font-family: "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f5f5f9;
            color: #566a7f;
            -webkit-font-smoothing: antialiased;
        }

        /* Sneat Sidebar Styling */
        .layout-menu {
            width: 260px;
            background-color: #ffffff;
            border-right: 1px solid #d9dee3;
            box-shadow: 0 0.125rem 0.375rem 0 rgba(161, 172, 184, 0.12);
            transition: all 0.3s ease;
        }
        .menu-header {
            position: relative;
            padding: 1.15rem 1.25rem 0.35rem 1.25rem;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.08rem;
            color: #a1acb8;
            text-transform: uppercase;
        }
        .menu-header::before {
            content: "";
            position: absolute;
            left: 1.25rem;
            right: 1.25rem;
            top: 0.5rem;
            height: 1px;
            background-color: #e7e7e8;
        }
        .menu-item {
            margin: 0.125rem 0.75rem;
        }
        .menu-link {
            display: flex;
            align-items: center;
            padding: 0.55rem 0.85rem;
            border-radius: 0.375rem;
            color: #697a8d;
            text-decoration: none;
            font-size: 0.84rem;
            font-weight: 500;
            transition: all 0.15s ease-in-out;
        }
        .menu-link:hover {
            background-color: rgba(67, 89, 113, 0.04);
            color: #566a7f;
        }
        .menu-item.active > .menu-link {
            background-color: rgba(105, 108, 255, 0.16) !important;
            color: #696cff !important;
            font-weight: 600;
        }
        .menu-icon {
            font-size: 1.25rem;
            margin-right: 0.75rem;
            color: #8592a3;
            width: 1.5rem;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }
        .menu-item.active .menu-icon {
            color: #696cff !important;
        }

        /* Sneat Floating Detached Navbar */
        .layout-navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(6px);
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #d9dee3;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #b4bdc6;
        }

        /* Sneat Soft Badges */
        .badge-sneat-primary { background-color: #e7e7ff; color: #696cff; }
        .badge-sneat-success { background-color: #e8fadf; color: #71dd37; }
        .badge-sneat-warning { background-color: #fff2d6; color: #ffab00; }
        .badge-sneat-danger { background-color: #ffe0db; color: #ff3e1d; }
        .badge-sneat-info { background-color: #d7f5fc; color: #03c3ec; }
    </style>
    @stack('styles')
</head>
<body class="bg-[#f5f5f9] antialiased">
    @php
        $siteProfile = \App\Models\SchoolProfile::first();
        $schoolLogo = $siteProfile->logo ?? '/assets/images/wikrama-logo-1.png';
    @endphp
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sneat Vertical Menu / Sidebar -->
        <aside id="layout-menu" class="layout-menu shrink-0 flex flex-col h-screen sticky top-0 z-40 transition-transform duration-300">
            <!-- Sneat Brand Header with Dynamic Wikrama Logo -->
            <div class="h-16 px-4 border-b border-gray-100 flex items-center justify-between shrink-0 bg-white">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 no-underline group flex-1 min-w-0" title="Dashboard Admin">
                    <div class="w-9 h-9 rounded-xl bg-white border border-gray-200 p-1 flex items-center justify-center shrink-0 shadow-sm group-hover:scale-105 transition">
                        <img src="{{ asset(ltrim($schoolLogo, '/')) }}" alt="Logo SMK Wikrama 1 Garut" class="w-full h-full object-contain" onerror="this.onerror=null; this.src='/assets/images/wikrama-logo-1.png';">
                    </div>
                    <div class="min-w-0">
                        <span class="font-extrabold text-sm text-gray-800 tracking-tight leading-none truncate block">WIKRAMA 1</span>
                        <span class="text-[10px] text-[#696cff] font-bold uppercase tracking-wider block">Sneat CMS</span>
                    </div>
                </a>
                <a href="{{ route('admin.profile.index') }}" class="p-1.5 text-gray-400 hover:text-[#696cff] hover:bg-purple-50 rounded-lg transition" title="Edit / Ganti Logo Sekolah">
                    <i class="bx bx-cog text-base"></i>
                </a>
                <button id="close-sidebar-mobile" class="md:hidden text-gray-400 hover:text-gray-600 ml-1">
                    <i class="bx bx-x text-2xl"></i>
                </button>
            </div>

            <!-- Sneat Menu Navigation -->
            <nav class="flex-1 py-3 overflow-y-auto">
                <ul class="space-y-0.5">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <i class="menu-icon bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>

                    <!-- PUSAT KENDALI EDIT -->
                    <li class="menu-header">
                        <span>Pusat Kendali Edit</span>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.web_smk*') ? 'active' : '' }}">
                        <a href="{{ route('admin.web_smk') }}" class="menu-link">
                            <i class="menu-icon bx bx-globe text-[#696cff]"></i>
                            <div class="flex-1">Edit Web Utama SMK</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.spmb_manager*') ? 'active' : '' }}">
                        <a href="{{ route('admin.spmb_manager') }}" class="menu-link">
                            <i class="menu-icon bx bx-user-pin text-[#ffab00]"></i>
                            <div class="flex-1">Edit Landing SPMB</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.home-features.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.home-features.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-layer text-[#03c3ec]"></i>
                            <div class="flex-1">12 Kartu Karakter &amp; Budaya</div>
                            <span class="badge-sneat-info px-1.5 py-0.5 rounded text-[10px] font-bold">12 Kartu</span>
                        </a>
                    </li>

                    <!-- MODUL KONTEN & MEDIA -->
                    <li class="menu-header">
                        <span>Modul Konten &amp; Media</span>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.sliders.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-carousel"></i>
                            <div class="flex-1">Banner Slider Hero</div>
                            <span class="badge-sneat-warning px-1.5 py-0.5 rounded text-[10px] font-bold">Hero/SPMB</span>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.achievements.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.achievements.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-trophy"></i>
                            <div>Prestasi Siswa</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-image-alt"></i>
                            <div>Galeri Foto &amp; Media</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.alumni.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-graduation"></i>
                            <div class="flex-1">Data Alumni (Web)</div>
                            <span class="badge-sneat-primary px-1.5 py-0.5 rounded text-[10px] font-bold">Web Utama</span>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.testimonials.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-message-rounded-check"></i>
                            <div class="flex-1">Testimoni (SPMB)</div>
                            <span class="badge-sneat-info px-1.5 py-0.5 rounded text-[10px] font-bold">Landing SPMB</span>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.teachers.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-user-voice"></i>
                            <div>Dewan Guru &amp; Pendidik</div>
                        </a>
                    </li>

                    <!-- IDENTITAS & RAPOR MUTU -->
                    <li class="menu-header">
                        <span>Identitas &amp; Rapor Mutu</span>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-image"></i>
                            <div class="flex-1">Logo, Profil &amp; Kontak</div>
                            <span class="badge-sneat-primary px-1.5 py-0.5 rounded text-[10px] font-bold">Edit Logo</span>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.reports.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-bar-chart-alt-2"></i>
                            <div>Rapor Mutu Sekolah</div>
                        </a>
                    </li>

                    <!-- AKADEMIK & KEUNGGULAN -->
                    <li class="menu-header">
                        <span>Akademik &amp; Keunggulan</span>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.majors.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.majors.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-book-bookmark"></i>
                            <div>Jurusan / Keahlian</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.facilities.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-buildings"></i>
                            <div>Fasilitas &amp; Sarpras</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.cultures.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.cultures.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-heart-circle"></i>
                            <div>Budaya Sekolah</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.news.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-news"></i>
                            <div>Berita &amp; Informasi</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.partners.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-briefcase-alt-2"></i>
                            <div>Mitra &amp; Kerjasama</div>
                        </a>
                    </li>

                    <!-- INTERAKSI -->
                    <li class="menu-header">
                        <span>Interaksi &amp; Masukan</span>
                    </li>

                    @php
                        $unreadMessagesCount = \App\Models\ContactMessage::where('is_read', false)->count();
                    @endphp
                    <li class="menu-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.messages.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-envelope"></i>
                            <div class="flex-1">Pesan Masuk</div>
                            @if($unreadMessagesCount > 0)
                                <span class="badge-sneat-danger px-2 py-0.5 rounded-full text-[10px] font-bold animate-pulse">
                                    {{ $unreadMessagesCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Bottom Live Web Links -->
            <div class="p-3 border-t border-gray-100 bg-gray-50/50">
                <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2 px-1">Pratinjau Web Publik</div>
                <div class="grid grid-cols-2 gap-1.5">
                    <a href="{{ route('home') }}" target="_blank" class="py-1.5 px-2 bg-white hover:bg-gray-100 text-gray-700 rounded-lg text-xs font-semibold flex items-center justify-center gap-1 border border-gray-200 transition">
                        <i class="bx bx-home text-sm text-[#696cff]"></i> Beranda
                    </a>
                    <a href="{{ route('spmb') }}" target="_blank" class="py-1.5 px-2 bg-white hover:bg-gray-100 text-gray-700 rounded-lg text-xs font-semibold flex items-center justify-center gap-1 border border-gray-200 transition">
                        <i class="bx bx-user-plus text-sm text-[#ffab00]"></i> SPMB
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Sneat Floating Detached Navbar -->
            <div class="px-4 sm:px-6 md:px-8 pt-4">
                <header class="layout-navbar h-16 px-4 sm:px-6 flex items-center justify-between">
                    <!-- Left: Mobile Menu Toggle & Page Title -->
                    <div class="flex items-center gap-3">
                        <button id="open-sidebar-mobile" class="md:hidden text-gray-500 hover:text-gray-700 p-1 rounded-lg">
                            <i class="bx bx-menu text-2xl"></i>
                        </button>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#696cff] hidden sm:inline-block"></span>
                            <h1 class="text-base sm:text-lg font-bold text-gray-800 leading-tight">
                                @yield('header_title', 'Dashboard')
                            </h1>
                        </div>
                    </div>

                    <!-- Right: Quick Live Web Link & Admin Profile Dropdown -->
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.profile.index') }}" class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-gray-700 bg-gray-100 hover:bg-purple-50 hover:text-[#696cff] transition border border-gray-200" title="Kelola / Ganti Logo Sekolah">
                            <i class="bx bx-image text-sm text-[#696cff]"></i> Ganti Logo
                        </a>

                        <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-[#696cff] bg-[#e7e7ff] hover:bg-[#696cff] hover:text-white transition">
                            <i class="bx bx-link-external"></i> Web Live
                        </a>

                        <div class="h-6 w-px bg-gray-200 hidden sm:block"></div>

                        <!-- User Info -->
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-[#696cff] text-white font-bold flex items-center justify-center text-sm shadow-sm">
                                {{ substr(auth()->user()->name ?? 'Admin', 0, 1) }}
                            </div>
                            <div class="hidden lg:block text-left">
                                <div class="text-xs font-bold text-gray-800 leading-tight">{{ auth()->user()->name ?? 'Administrator' }}</div>
                                <div class="text-[10px] text-gray-400">{{ auth()->user()->email ?? 'admin@smkwikrama1garut.sch.id' }}</div>
                            </div>
                        </div>

                        <!-- Logout Form -->
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2 text-gray-400 hover:text-[#ff3e1d] hover:bg-red-50 rounded-lg transition" title="Logout dari Admin">
                                <i class="bx bx-power-off text-lg"></i>
                            </button>
                        </form>
                    </div>
                </header>
            </div>

            <!-- Content Body -->
            <main class="flex-1 p-4 sm:p-6 md:p-8">
                <!-- Notifications -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3 shadow-sm">
                        <i class="bx bx-check-circle text-xl text-emerald-600"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl flex items-center gap-3 shadow-sm">
                        <i class="bx bx-error-circle text-xl text-red-600"></i>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl shadow-sm">
                        <div class="flex items-center gap-2 font-bold text-sm mb-1">
                            <i class="bx bx-error text-red-600"></i> Terjadi Kesalahan Pengisian Form:
                        </div>
                        <ul class="list-disc list-inside text-xs text-red-700 space-y-1">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Sneat Footer -->
            <footer class="px-6 py-4 border-t border-gray-200 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} SMK Wikrama 1 Garut • Sneat Admin CMS. Dikelola secara profesional.
            </footer>
        </div>
    </div>

    <!-- Mobile Sidebar Backdrop & Toggle Scripts -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-black/40 z-30 hidden md:hidden"></div>

    <script>
        const sidebar = document.getElementById('layout-menu');
        const openBtn = document.getElementById('open-sidebar-mobile');
        const closeBtn = document.getElementById('close-sidebar-mobile');
        const backdrop = document.getElementById('sidebar-backdrop');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('fixed', 'inset-y-0', 'left-0');
            backdrop.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        }

        if (openBtn) openBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (backdrop) backdrop.addEventListener('click', closeSidebar);
    </script>

    @stack('scripts')
</body>
</html>
