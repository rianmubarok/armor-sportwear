@extends('layouts.public')

@section('content')
<div class="pt-32 pb-24 bg-[#F2F2F0] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <div class="mb-10">
            <a href="{{ route('katalog') }}" class="inline-flex items-center gap-2 text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors text-sm font-['Rajdhani'] font-semibold uppercase tracking-wider">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Katalog
            </a>
        </div>

        <div class="bg-white border border-[#D0D0CC] overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                {{-- Image Section --}}
                <div class="flex flex-col bg-[#E8E8E4]">
                    <div class="aspect-square lg:aspect-auto relative min-h-[400px] flex-1">
                        <img id="main-product-image" src="{{ Storage::url($product->image) }}"
                             alt="{{ $product->name }}"
                             class="absolute inset-0 w-full h-full object-cover transition-all duration-300">
                        {{-- Category badge --}}
                        @if($product->category)
                        <div class="absolute top-6 left-6">
                            <span class="bg-[#1A1A1A] text-white text-xs px-3 py-1.5 font-bold uppercase tracking-widest font-['Rajdhani']">
                                {{ $product->category }}
                            </span>
                        </div>
                        @endif
                    </div>

                    {{-- Gallery Thumbnails --}}
                    @if($product->images->count() > 0)
                    <div class="flex overflow-x-auto gap-4 p-6 bg-white border-t border-[#D0D0CC]">
                        <img src="{{ Storage::url($product->image) }}" 
                             onclick="document.getElementById('main-product-image').src=this.src"
                             class="w-20 h-20 object-cover cursor-pointer hover:opacity-75 transition-opacity border border-[#D0D0CC] flex-shrink-0">
                        @foreach($product->images as $galleryImg)
                            <img src="{{ Storage::url($galleryImg->image) }}" 
                                 onclick="document.getElementById('main-product-image').src=this.src"
                                 class="w-20 h-20 object-cover cursor-pointer hover:opacity-75 transition-opacity border border-[#D0D0CC] flex-shrink-0">
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Detail Section --}}
                <div class="p-8 md:p-12 flex flex-col justify-center bg-white border-l border-[#D0D0CC]">

                    <h1 class="text-5xl md:text-6xl font-extrabold text-[#1A1A1A] uppercase font-['Teko'] leading-none mb-6">{{ $product->name }}</h1>

                    @if($product->price_start_from)
                    <div class="mb-8 pb-8 border-b border-[#D0D0CC]">
                        <span class="text-[#6B6B6B] block mb-1 text-xs font-bold uppercase tracking-widest font-['Rajdhani']">Estimasi Harga Mulai</span>
                        <span class="text-4xl font-bold text-[#1A1A1A] font-['Teko']">Rp {{ number_format($product->price_start_from, 0, ',', '.') }}</span>
                        <p class="text-xs text-[#6B6B6B] mt-2 font-['Rajdhani']">*Harga akhir menyesuaikan dengan bahan, sablon, dan tingkat kesulitan custom.</p>
                    </div>
                    @else
                    <div class="mb-8 pb-8 border-b border-[#D0D0CC]">
                        <span class="text-[#6B6B6B] block mb-1 text-xs font-bold uppercase tracking-widest font-['Rajdhani']">Estimasi Harga</span>
                        <span class="text-3xl font-bold text-[#1A1A1A] font-['Teko']">Hubungi Kami</span>
                        <p class="text-xs text-[#6B6B6B] mt-2 font-['Rajdhani']">*Harga menyesuaikan dengan bahan, sablon, dan tingkat kesulitan custom.</p>
                    </div>
                    @endif

                    <div class="mb-10">
                        <h3 class="text-xs font-bold text-[#1A1A1A] uppercase tracking-widest mb-3 font-['Rajdhani']">Deskripsi & Detail</h3>
                        <p class="text-[#6B6B6B] leading-relaxed whitespace-pre-line font-['Rajdhani'] font-medium text-base">{{ $product->description }}</p>
                    </div>

                    {{-- Stats / detail row --}}
                    <div class="grid grid-cols-3 gap-4 mb-10 border-t border-[#D0D0CC] pt-8">
                        @if($product->category)
                        <div>
                            <span class="text-xs font-bold text-[#6B6B6B] uppercase tracking-widest block mb-1 font-['Rajdhani']">Kategori</span>
                            <span class="text-lg font-bold text-[#1A1A1A] uppercase font-['Teko']">{{ $product->category }}</span>
                        </div>
                        @endif
                        <div>
                            <span class="text-xs font-bold text-[#6B6B6B] uppercase tracking-widest block mb-1 font-['Rajdhani']">Bahan</span>
                            <span class="text-lg font-bold text-[#1A1A1A] uppercase font-['Teko']">Dry-Fit</span>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-[#6B6B6B] uppercase tracking-widest block mb-1 font-['Rajdhani']">Ukuran</span>
                            <span class="text-lg font-bold text-[#1A1A1A] uppercase font-['Teko']">S – XXL</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        @php
                            $waText = "Halo Armor Sportwear, saya ingin memesan jersey custom dengan referensi model *" . $product->name . "*. Bagaimana prosedur pemesanan dan harganya?";
                        @endphp
                        <a href="https://wa.me/6285718516143?text={{ urlencode($waText) }}"
                           target="_blank"
                           class="btn-dark flex-1 justify-center gap-3 group">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Pesan via WhatsApp
                        </a>
                        <a href="{{ route('preview-jersey') }}" class="btn-outline flex-1 justify-center">
                            Coba Preview Custom
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
