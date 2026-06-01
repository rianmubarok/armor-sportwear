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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a; /* Slate 900 for a dark sporty theme */
            color: #f8fafc; /* Slate 50 */
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
        /* Custom Neon Colors for Tailwind (Inline classes or extended in tailwind.config) */
        .text-neon-green { color: #39ff14; }
        .bg-neon-green { background-color: #39ff14; }
        .border-neon-green { border-color: #39ff14; }
    </style>
</head>
<body class="antialiased selection:bg-neon-green selection:text-black">

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
