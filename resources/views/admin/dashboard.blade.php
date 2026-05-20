@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas Armor Sportwear')

@section('content')

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        {{-- Card: Total Produk --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Produk</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>

        {{-- Card: Pesanan Masuk --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Pesanan Masuk</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>

        {{-- Card: Diproses --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Diproses</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>

        {{-- Card: Selesai --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Selesai</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>

    </div>

    {{-- Info Panel --}}
    <div class="bg-white rounded-xl border border-gray-200 p-8">
        <div class="flex items-start gap-4">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 mb-1">Sistem siap digunakan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Panel admin Armor Sportwear berhasil dikonfigurasi. Selanjutnya Anda dapat menambahkan
                    fitur manajemen produk, pengelolaan pesanan, dan fitur lainnya sesuai kebutuhan skripsi.
                </p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 bg-green-50 text-green-700 rounded-full font-medium border border-green-200">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Authentication ✓
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 bg-green-50 text-green-700 rounded-full font-medium border border-green-200">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Authorization ✓
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 bg-gray-50 text-gray-500 rounded-full font-medium border border-gray-200">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span> Manajemen Produk (soon)
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 bg-gray-50 text-gray-500 rounded-full font-medium border border-gray-200">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span> Manajemen Pesanan (soon)
                    </span>
                </div>
            </div>
        </div>
    </div>

@endsection
