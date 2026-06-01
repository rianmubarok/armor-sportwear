<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;500;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Rajdhani', sans-serif; background-color: #F2F2F0; }
        h1,h2,h3 { font-family: 'Teko', sans-serif; text-transform: uppercase; }
        /* Override Breeze default input styles */
        input[type="email"], input[type="password"], input[type="text"] {
            border-radius: 0 !important;
            border: 2px solid #D0D0CC !important;
            font-family: 'Rajdhani', sans-serif !important;
            font-size: 1rem !important;
            font-weight: 500 !important;
            background: #fff !important;
            padding: 0.75rem 1rem !important;
        }
        input[type="email"]:focus, input[type="password"]:focus, input[type="text"]:focus {
            border-color: #1A1A1A !important;
            box-shadow: none !important;
            outline: none !important;
            ring: none !important;
        }
        label { font-family: 'Rajdhani', sans-serif; font-weight: 700; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; color: #6B6B6B; }
        button[type="submit"] {
            width: 100%;
            background: #1A1A1A;
            color: #fff;
            padding: 1rem;
            font-family: 'Teko', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
            border-radius: 0 !important;
        }
        button[type="submit"]:hover { background: #333; }
        a.underline { color: #6B6B6B; font-family: 'Rajdhani', sans-serif; font-size: 0.9rem; }
        a.underline:hover { color: #1A1A1A; }
    </style>
</head>
<body class="antialiased min-h-screen flex">

    {{-- Left panel - branding --}}
    <div class="hidden lg:flex lg:w-1/2 bg-[#1A1A1A] flex-col justify-between p-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>

        <div class="relative z-10">
            <a href="{{ url('/') }}" class="text-3xl font-bold text-white font-['Teko'] uppercase tracking-wide">
                ARMOR<span class="text-white/30">.</span>
            </a>
            <p class="text-white/30 text-[10px] font-bold uppercase tracking-widest font-['Rajdhani'] mt-1">Admin Panel</p>
        </div>

        <div class="relative z-10">
            <div class="text-white/10 text-6xl mb-6">✦</div>
            <h2 class="text-6xl font-bold text-white font-['Teko'] leading-none mb-4">KELOLA<br>BISNIS<br><span class="text-white/30">ANDA.</span></h2>
            <p class="text-white/40 text-base font-['Rajdhani'] font-medium leading-relaxed max-w-sm">
                Panel admin Armor Sportwear untuk mengelola produk, katalog, dan aktivitas bisnis Anda.
            </p>
        </div>

        <div class="relative z-10 flex gap-8 text-white/20">
            <div>
                <p class="text-3xl font-bold font-['Teko']">2022</p>
                <p class="text-[10px] font-['Rajdhani'] uppercase tracking-widest">Berdiri sejak</p>
            </div>
            <div>
                <p class="text-3xl font-bold font-['Teko']">100+</p>
                <p class="text-[10px] font-['Rajdhani'] uppercase tracking-widest">Produk custom</p>
            </div>
        </div>
    </div>

    {{-- Right panel - form --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-[#F2F2F0]">
        <div class="w-full max-w-md">

            {{-- Mobile logo --}}
            <div class="lg:hidden mb-8">
                <a href="{{ url('/') }}" class="text-3xl font-bold text-[#1A1A1A] font-['Teko'] uppercase tracking-wide">
                    ARMOR<span class="text-[#9A9A9A]">.</span>
                </a>
            </div>

            <div class="mb-8">
                <p class="text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani'] mb-2">✦ Admin Area</p>
                <h1 class="text-5xl font-bold text-[#1A1A1A] font-['Teko'] leading-none">Masuk ke<br>Panel Admin</h1>
            </div>

            {{ $slot }}

            <p class="text-center text-sm text-[#9A9A9A] font-['Rajdhani'] mt-6">
                <a href="{{ url('/') }}" class="hover:text-[#1A1A1A] transition no-underline">← Kembali ke Website</a>
            </p>
        </div>
    </div>

</body>
</html>
