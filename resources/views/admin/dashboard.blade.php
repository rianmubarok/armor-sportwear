@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas Armor Sportwear')

@section('content')

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        {{-- Total Produk --}}
        <div class="bg-white border border-[#D0D0CC] p-6">
            <p class="text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani'] mb-3">Total Produk</p>
            <p class="text-5xl font-bold text-[#1A1A1A] font-['Teko'] leading-none">{{ $totalProducts ?? 0 }}</p>
            <div class="mt-4 pt-4 border-t border-[#F2F2F0] flex items-center gap-2">
                <svg class="w-4 h-4 text-[#9A9A9A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <span class="text-xs text-[#9A9A9A] font-['Rajdhani'] font-semibold uppercase">Katalog aktif</span>
            </div>
        </div>

        {{-- Pesanan Masuk --}}
        <div class="bg-white border border-[#D0D0CC] p-6">
            <p class="text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani'] mb-3">Pesanan Masuk</p>
            <p class="text-5xl font-bold text-[#1A1A1A] font-['Teko'] leading-none">{{ $pendingOrders ?? 0 }}</p>
            <div class="mt-4 pt-4 border-t border-[#F2F2F0] flex items-center gap-2">
                <svg class="w-4 h-4 text-[#9A9A9A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="text-xs text-[#9A9A9A] font-['Rajdhani'] font-semibold uppercase">Menunggu proses</span>
            </div>
        </div>

        {{-- Diproses --}}
        <div class="bg-white border border-[#D0D0CC] p-6">
            <p class="text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani'] mb-3">Diproses</p>
            <p class="text-5xl font-bold text-[#1A1A1A] font-['Teko'] leading-none">{{ $processingOrders ?? 0 }}</p>
            <div class="mt-4 pt-4 border-t border-[#F2F2F0] flex items-center gap-2">
                <svg class="w-4 h-4 text-[#9A9A9A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-xs text-[#9A9A9A] font-['Rajdhani'] font-semibold uppercase">Sedang produksi</span>
            </div>
        </div>

        {{-- Selesai --}}
        <div class="bg-[#1A1A1A] border border-[#1A1A1A] p-6">
            <p class="text-[10px] font-bold text-white/40 uppercase tracking-widest font-['Rajdhani'] mb-3">Selesai</p>
            <p class="text-5xl font-bold text-white font-['Teko'] leading-none">{{ $completedOrders ?? 0 }}</p>
            <div class="mt-4 pt-4 border-t border-white/10 flex items-center gap-2">
                <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-xs text-white/40 font-['Rajdhani'] font-semibold uppercase">Terkirim</span>
            </div>
        </div>
    </div>

    {{-- Quick Actions + System Status --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Quick Actions --}}
        <div class="lg:col-span-1 bg-white border border-[#D0D0CC] p-6">
            <h3 class="text-xl font-bold text-[#1A1A1A] font-['Teko'] uppercase mb-4 pb-3 border-b border-[#F2F2F0]">Aksi Cepat</h3>
            <div class="space-y-2">
                <a href="{{ route('admin.products.create') }}" class="admin-btn w-full justify-center text-sm py-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Produk Baru
                </a>
                <a href="{{ route('admin.products.index') }}" class="admin-btn-outline w-full justify-center text-sm py-2.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    Kelola Produk
                </a>
                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2 text-sm text-[#9A9A9A] hover:text-[#1A1A1A] font-['Rajdhani'] font-semibold uppercase tracking-wider pt-2 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    Buka Website →
                </a>
            </div>
        </div>

        {{-- System Status --}}
        <div class="lg:col-span-2 bg-white border border-[#D0D0CC] p-6">
            <h3 class="text-xl font-bold text-[#1A1A1A] font-['Teko'] uppercase mb-4 pb-3 border-b border-[#F2F2F0]">Status Sistem</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between py-2 border-b border-[#F2F2F0]">
                    <span class="text-sm font-semibold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-wider">Authentication</span>
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1 bg-[#F2F2F0] text-[#1A1A1A] font-bold uppercase tracking-widest font-['Rajdhani']">
                        <span class="w-1.5 h-1.5 bg-[#1A1A1A] rounded-full"></span> Aktif
                    </span>
                </div>
                <div class="flex items-center justify-between py-2 border-b border-[#F2F2F0]">
                    <span class="text-sm font-semibold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-wider">Authorization (Admin Guard)</span>
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1 bg-[#F2F2F0] text-[#1A1A1A] font-bold uppercase tracking-widest font-['Rajdhani']">
                        <span class="w-1.5 h-1.5 bg-[#1A1A1A] rounded-full"></span> Aktif
                    </span>
                </div>
                <div class="flex items-center justify-between py-2 border-b border-[#F2F2F0]">
                    <span class="text-sm font-semibold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-wider">Manajemen Produk</span>
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1 bg-[#F2F2F0] text-[#1A1A1A] font-bold uppercase tracking-widest font-['Rajdhani']">
                        <span class="w-1.5 h-1.5 bg-[#1A1A1A] rounded-full"></span> Aktif
                    </span>
                </div>
                <div class="flex items-center justify-between py-2">
                    <span class="text-sm font-semibold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-wider">Manajemen Pesanan</span>
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1 bg-[#F2F2F0] text-[#1A1A1A] font-bold uppercase tracking-widest font-['Rajdhani']">
                        <span class="w-1.5 h-1.5 bg-[#1A1A1A] rounded-full"></span> Aktif
                    </span>
                </div>
            </div>
        </div>
    </div>

@endsection
