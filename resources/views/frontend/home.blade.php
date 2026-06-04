@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <x-frontend.hero :heroImages="$heroImages" />

    <!-- Katalog / Featured Products Section -->
    <x-frontend.featured-catalog :products="$featuredProducts" />

    <!-- Keunggulan Layanan Section -->
    <x-frontend.features />

    <!-- Jersey 3D Preview Section -->
    <x-frontend.jersey-preview />

    <!-- Cara Pemesanan Section -->
    <x-frontend.order-steps />

    <!-- Portfolio / Hasil Produksi Section -->
    <x-frontend.portfolio :portfolios="$portfolios" />

    <!-- CTA WhatsApp Section -->
    <x-frontend.cta-whatsapp />
@endsection
