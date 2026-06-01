<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Armor Sportwear - Vendor Custom Jersey & Sportwear Premium">

    <title>Armor Sportwear | Custom Jersey & Sportwear Premium</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;500;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-bg: #F2F2F0;
            --color-surface: #E8E8E4;
            --color-dark: #1A1A1A;
            --color-accent: #1A1A1A;
            --color-muted: #6B6B6B;
            --color-border: #D0D0CC;
            --color-white: #FFFFFF;
        }

        * { box-sizing: border-box; }

        html, body {
            background-color: var(--color-bg);
            color: var(--color-dark);
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Teko', sans-serif;
            text-transform: uppercase;
            line-height: 1.05;
            letter-spacing: -0.01em;
            color: var(--color-dark);
        }

        /* Utility Classes */
        .bg-site        { background-color: var(--color-bg); }
        .bg-site-surface{ background-color: var(--color-surface); }
        .bg-site-dark   { background-color: var(--color-dark); }
        .bg-site-white  { background-color: var(--color-white); }
        .text-site-dark { color: var(--color-dark); }
        .text-site-muted{ color: var(--color-muted); }
        .text-site-white{ color: var(--color-white); }
        .border-site    { border-color: var(--color-border); }

        .btn-dark {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--color-dark);
            color: #fff;
            font-family: 'Teko', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.85rem 2.5rem;
            transition: background 0.2s, transform 0.2s;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-dark:hover {
            background-color: #333;
            transform: translateY(-1px);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
            color: var(--color-dark);
            font-family: 'Teko', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.75rem 2.5rem;
            border: 2px solid var(--color-dark);
            transition: background 0.2s, color 0.2s;
            text-decoration: none;
        }
        .btn-outline:hover {
            background-color: var(--color-dark);
            color: #fff;
        }

        .star-icon::before {
            content: '✦';
            font-size: 1.25rem;
            color: var(--color-dark);
        }

        ::selection { background-color: #1A1A1A; color: #fff; }

        /* Thin separator line */
        .divider { border-color: var(--color-border); }
    </style>
</head>
<body class="antialiased">

    <!-- Navbar -->
    <x-frontend.navbar />

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-frontend.footer />

    @stack('scripts')
</body>
</html>
