<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;500;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Rajdhani', sans-serif; background-color: #F2F2F0; color: #1A1A1A; }
        h1,h2,h3,h4,h5,h6 { font-family: 'Teko', sans-serif; text-transform: uppercase; }
        .sidebar-link { display: flex; align-items: center; gap: 0.75rem; padding: 0.6rem 0.75rem; font-family: 'Rajdhani', sans-serif; font-weight: 600; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em; color: #9A9A9A; transition: all 0.15s; border-left: 2px solid transparent; }
        .sidebar-link:hover { color: #1A1A1A; background-color: #F2F2F0; }
        .sidebar-link.active { color: #1A1A1A; border-left-color: #1A1A1A; background-color: #F2F2F0; }
        .sidebar-link.disabled { color: #C0C0BB; cursor: not-allowed; }
        .admin-btn { display: inline-flex; align-items: center; gap: 0.5rem; background: #1A1A1A; color: #fff; font-family: 'Teko', sans-serif; font-size: 1rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.55rem 1.25rem; border: none; cursor: pointer; text-decoration: none; transition: background 0.15s; }
        .admin-btn:hover { background: #333; }
        .admin-btn-outline { display: inline-flex; align-items: center; gap: 0.5rem; background: transparent; color: #1A1A1A; font-family: 'Teko', sans-serif; font-size: 1rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.5rem 1.25rem; border: 1.5px solid #1A1A1A; cursor: pointer; text-decoration: none; transition: all 0.15s; }
        .admin-btn-outline:hover { background: #1A1A1A; color: #fff; }
        .admin-btn-danger { display: inline-flex; align-items: center; gap: 0.5rem; background: transparent; color: #CC3333; font-family: 'Teko', sans-serif; font-size: 1rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.5rem 1rem; border: 1.5px solid #CC3333; cursor: pointer; text-decoration: none; transition: all 0.15s; }
        .admin-btn-danger:hover { background: #CC3333; color: #fff; }
        .admin-input { display: block; width: 100%; padding: 0.6rem 0.75rem; border: 1.5px solid #D0D0CC; background: #fff; font-family: 'Rajdhani', sans-serif; font-size: 1rem; font-weight: 500; color: #1A1A1A; outline: none; border-radius: 0; transition: border-color 0.15s; }
        .admin-input:focus { border-color: #1A1A1A; }
        .admin-label { display: block; font-family: 'Rajdhani', sans-serif; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #6B6B6B; margin-bottom: 0.4rem; }
    </style>
</head>
<body class="antialiased">

    <div class="min-h-screen flex">

        {{-- ===== SIDEBAR ===== --}}
        <aside class="w-60 bg-white border-r border-[#D0D0CC] flex flex-col fixed inset-y-0 left-0 z-50">

            {{-- Brand --}}
            <div class="px-6 py-6 border-b border-[#D0D0CC]">
                <a href="{{ route('admin.dashboard') }}" class="block">
                    <p class="text-2xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none tracking-wide">ARMOR<span class="text-[#9A9A9A]">.</span></p>
                    <p class="text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani'] mt-0.5">Admin Panel</p>
                </a>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 py-6 px-3 space-y-0.5">
                <p class="text-[10px] font-bold text-[#C0C0BB] uppercase tracking-widest px-3 mb-3 font-['Rajdhani']">Menu Utama</p>

                <a href="{{ route('admin.dashboard') }}"
                   class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Produk
                </a>

                <a href="{{ route('admin.portfolios.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Portofolio
                </a>

                <a href="{{ route('admin.hero-images.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.hero-images.*') ? 'active' : '' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Hero Image
                </a>

                <a href="#" class="sidebar-link disabled">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Pesanan
                    <span class="ml-auto text-[10px] bg-[#F2F2F0] text-[#C0C0BB] px-1.5 py-0.5 font-['Rajdhani'] font-bold uppercase tracking-wider">Soon</span>
                </a>
            </nav>

            {{-- Divider --}}
            <div class="mx-3 border-t border-[#D0D0CC] mb-3"></div>

            {{-- View Site --}}
            <div class="px-3 mb-2">
                <a href="{{ url('/') }}" target="_blank" class="sidebar-link text-[#9A9A9A] hover:text-[#1A1A1A]">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Lihat Website
                </a>
            </div>

            {{-- User info + Logout --}}
            <div class="px-4 py-4 border-t border-[#D0D0CC] bg-[#F8F8F6]">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-8 h-8 bg-[#1A1A1A] flex items-center justify-center text-xs font-bold text-white font-['Teko'] uppercase">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-[#1A1A1A] truncate font-['Rajdhani'] uppercase">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-[#9A9A9A] truncate font-['Rajdhani']">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-2 text-sm text-[#9A9A9A] hover:text-[#1A1A1A] transition font-['Rajdhani'] font-semibold uppercase tracking-wider">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        <div class="flex-1 ml-60 flex flex-col min-h-screen">

            {{-- Top Header --}}
            <header class="bg-white border-b border-[#D0D0CC] px-8 py-4 flex items-center justify-between sticky top-0 z-40">
                <div>
                    <h1 class="text-2xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none">@yield('page-title', 'Dashboard')</h1>
                    <p class="text-xs text-[#9A9A9A] font-['Rajdhani'] font-semibold uppercase tracking-wider">@yield('page-subtitle', 'Selamat datang di panel admin Armor Sportwear')</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold uppercase tracking-widest bg-[#1A1A1A] text-white font-['Rajdhani']">
                        <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                        Admin
                    </span>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 px-8 py-8">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="px-8 py-4 border-t border-[#D0D0CC] bg-white">
                <p class="text-xs text-[#9A9A9A] font-['Rajdhani']">&copy; {{ date('Y') }} Armor Sportwear. All rights reserved.</p>
            </footer>

        </div>
    </div>

</body>
</html>
