@extends('layouts.admin')

@section('page-title', 'Manajemen Hero Image')
@section('page-subtitle', 'Kelola gambar utama yang tampil di beranda')

@section('content')

@if(session('success'))
<div class="mb-6 p-4 border-l-4 border-[#1A1A1A] bg-white text-[#1A1A1A] font-['Rajdhani'] font-semibold flex items-center gap-3">
    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    {{ session('success') }}
</div>
@endif

<div class="bg-white border border-[#D0D0CC]">
    {{-- Table Header --}}
    <div class="p-6 border-b border-[#D0D0CC] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none">Daftar Hero Image</h2>
            <p class="text-xs text-[#9A9A9A] font-['Rajdhani'] font-semibold uppercase tracking-wider mt-0.5">{{ $heroImages->total() }} gambar terdaftar</p>
        </div>
        <a href="{{ route('admin.hero-images.create') }}" class="admin-btn">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Gambar
        </a>
    </div>

    {{-- Table --}}
    {{-- Grid View --}}
    <div class="p-6 bg-[#F8F8F6]">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($heroImages as $image)
            <div class="aspect-video bg-white border border-[#D0D0CC] shadow-sm relative group overflow-hidden">
                <img src="{{ Storage::url($image->image) }}" alt="Hero Image" class="w-full h-full object-cover">
                
                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-[#1A1A1A]/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <form action="{{ route('admin.hero-images.destroy', $image) }}" method="POST" onsubmit="return confirm('Hapus gambar hero ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white p-3 rounded-full transition-transform transform scale-90 group-hover:scale-100" title="Hapus Gambar">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 bg-white text-center border-2 border-dashed border-[#D0D0CC]">
                <p class="text-4xl font-bold text-[#D0D0CC] font-['Teko'] uppercase mb-2">Belum Ada Gambar</p>
                <p class="text-[#9A9A9A] font-['Rajdhani'] font-medium mb-4">Mulai dengan menambahkan hero image pertama Anda.</p>
                <a href="{{ route('admin.hero-images.create') }}" class="admin-btn inline-flex">Tambah Gambar</a>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Pagination --}}
    <div class="p-6 border-t border-[#D0D0CC]">
        {{ $heroImages->links() }}
    </div>
</div>
@endsection
