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
                    <div class="aspect-square lg:aspect-auto relative min-h-[400px] flex-1 group cursor-pointer" onclick="openModal(document.getElementById('main-product-image').src)">
                        <img id="main-product-image" src="{{ Storage::url($product->image) }}"
                             alt="{{ $product->name }}"
                             class="absolute inset-0 w-full h-full object-cover transition-all duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/10 transition-all duration-300 flex items-center justify-center pointer-events-none">
                            <span class="bg-[#1A1A1A] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-75 group-hover:scale-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                            </span>
                        </div>
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
                    @if($product->category)
                    <div class="grid grid-cols-3 gap-4 mb-10 border-t border-[#D0D0CC] pt-8">
                        <div>
                            <span class="text-xs font-bold text-[#6B6B6B] uppercase tracking-widest block mb-1 font-['Rajdhani']">Kategori</span>
                            <span class="text-lg font-bold text-[#1A1A1A] uppercase font-['Teko']">{{ $product->category }}</span>
                        </div>
                    </div>
                    @endif

                    <div class="flex flex-col sm:flex-row gap-3">
                        @php
                            $waText = "Halo Armor Sportwear, saya ingin memesan jersey custom dengan referensi model *" . $product->name . "*";
                        @endphp
                        <a href="https://wa.me/6285718516143?text={{ urlencode($waText) }}"
                           target="_blank"
                           class="btn-dark flex-1 justify-center gap-3 group">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Produk Lainnya -->
    @if(isset($otherProducts) && $otherProducts->count() > 0)
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 mt-16">
        <h3 class="text-3xl font-bold text-[#1A1A1A] uppercase font-['Teko'] mb-8 border-b border-[#D0D0CC] pb-4">Lihat Produk Lainnya</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($otherProducts as $item)
            <div class="group bg-[#E8E8E4] overflow-hidden hover:bg-[#DEDED8] transition-all duration-300 border border-[#D0D0CC] flex flex-col">
                <a href="{{ route('katalog.show', $item) }}" class="block aspect-[4/5] relative overflow-hidden bg-[#D8D8D4]">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://images.unsplash.com/photo-1628891435222-06592ce29663?q=80&w=600&auto=format&fit=crop' }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $item->name }}">
                    <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/20 transition-all duration-300 flex items-center justify-center">
                        <span class="btn-dark opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 text-sm py-2 px-4">
                            Lihat
                        </span>
                    </div>
                </a>
                <div class="p-4 flex flex-col flex-1">
                    <a href="{{ route('katalog.show', $item) }}">
                        <h4 class="text-xl font-bold text-[#1A1A1A] uppercase font-['Teko'] group-hover:text-[#6B6B6B] transition-colors leading-tight truncate">{{ $item->name }}</h4>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<!-- Modal untuk Preview Gambar Full -->
<div id="image-modal" class="fixed inset-0 z-50 bg-black/90 hidden items-center justify-center opacity-0 transition-opacity duration-300 p-4" onclick="closeModal()">
    <button type="button" class="absolute top-6 right-6 text-white hover:text-gray-300 p-2" onclick="closeModal()">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <img id="modal-image" src="" class="max-w-full max-h-[90vh] object-contain shadow-2xl scale-95 transition-transform duration-300" onclick="event.stopPropagation()">
</div>

<script>
    function openModal(imageSrc) {
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');
        modalImg.src = imageSrc;
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Trigger reflow for transition
        void modal.offsetWidth;
        
        modal.classList.remove('opacity-0');
        modalImg.classList.remove('scale-95');
        modalImg.classList.add('scale-100');
        
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');
        
        modal.classList.add('opacity-0');
        modalImg.classList.remove('scale-100');
        modalImg.classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }, 300);
    }
    
    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });
</script>
@endsection
