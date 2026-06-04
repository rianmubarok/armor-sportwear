@extends('layouts.public')

@section('content')
<div class="pt-32 pb-24 bg-[#F2F2F0] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 border-b border-[#D0D0CC] pb-8">
            <div>
                <p class="text-[#6B6B6B] text-xs font-bold tracking-widest uppercase mb-3 font-['Rajdhani']">✦ Koleksi</p>
                <h1 class="text-5xl md:text-7xl font-extrabold text-[#1A1A1A] uppercase font-['Teko'] leading-none">Katalog<br><span class="text-[#6B6B6B]">Produk</span></h1>
            </div>
            <p class="text-[#6B6B6B] max-w-sm text-base font-['Rajdhani'] font-medium leading-relaxed mt-6 md:mt-0">
                Pilih dari koleksi desain terbaik kami, atau jadikan sebagai referensi untuk custom jersey impian Anda.
            </p>
        </div>

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @forelse($products as $product)
                <div class="group bg-[#E8E8E4] border border-[#D0D0CC] overflow-hidden hover:bg-[#DEDED8] transition-all duration-300 flex flex-col">
                    <a href="{{ route('katalog.show', $product) }}" class="block aspect-[4/5] relative overflow-hidden bg-[#D8D8D4]">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                        {{-- Category badge --}}
                        @if($product->category)
                        <div class="absolute top-4 left-4">
                            <span class="bg-[#1A1A1A] text-white text-xs px-3 py-1 font-bold uppercase tracking-widest font-['Rajdhani']">
                                {{ $product->category }}
                            </span>
                        </div>
                        @endif
                        {{-- Hover overlay --}}
                        <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/20 transition-all duration-300 flex items-center justify-center">
                            <span class="btn-dark opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 text-sm py-3 px-5">
                                Lihat Detail
                            </span>
                        </div>
                    </a>

                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <a href="{{ route('katalog.show', $product) }}">
                                <h3 class="text-2xl font-bold text-[#1A1A1A] uppercase font-['Teko'] leading-tight group-hover:text-[#6B6B6B] transition-colors">{{ $product->name }}</h3>
                            </a>
                        </div>
                        <p class="text-[#6B6B6B] text-sm line-clamp-2 mb-4 flex-1 font-['Rajdhani'] font-medium">{{ $product->description }}</p>

                        @if($product->price_start_from)
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-[#D0D0CC]">
                            <div>
                                <span class="text-xs text-[#6B6B6B] block font-['Rajdhani'] uppercase tracking-wider">Mulai dari</span>
                                <span class="text-xl font-bold text-[#1A1A1A] font-['Teko']">Rp {{ number_format($product->price_start_from, 0, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('katalog.show', $product) }}"
                               class="w-10 h-10 bg-[#1A1A1A] flex items-center justify-center text-white hover:bg-[#333] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                        @else
                        <div class="flex items-center justify-end mt-auto pt-4 border-t border-[#D0D0CC]">
                            <a href="{{ route('katalog.show', $product) }}"
                               class="w-10 h-10 bg-[#1A1A1A] flex items-center justify-center text-white hover:bg-[#333] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-24 bg-[#E8E8E4] border border-[#D0D0CC]">
                    <p class="text-4xl font-bold text-[#D0D0CC] font-['Teko'] uppercase mb-4">Belum Ada Produk</p>
                    <p class="text-[#6B6B6B] font-['Rajdhani'] font-medium">Katalog belum tersedia saat ini. Hubungi kami untuk konsultasi desain.</p>
                    <a href="https://wa.me/6285718516143" target="_blank" class="btn-dark inline-flex mt-6">Hubungi via WhatsApp</a>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center">
            {{ $products->links('pagination::tailwind') }}
        </div>

    </div>
</div>
@endsection
