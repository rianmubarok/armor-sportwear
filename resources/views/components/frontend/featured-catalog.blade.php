@props(['products' => []])
<section id="katalog" class="py-24 bg-[#F2F2F0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6 border-b border-[#D0D0CC] pb-8">
            <div>
                <p class="text-[#6B6B6B] text-xs font-bold tracking-widest uppercase mb-3 font-['Rajdhani']">✦ Koleksi</p>
                <h2 class="text-5xl md:text-7xl font-extrabold text-[#1A1A1A] uppercase font-['Teko'] leading-none">Koleksi<br><span class="text-[#6B6B6B]">Unggulan</span></h2>
            </div>
            <p class="text-[#6B6B6B] max-w-sm text-base font-['Rajdhani'] font-medium leading-relaxed">Inspirasi desain jersey terbaik untuk tim kesayangan Anda. Semua desain dapat di-custom sesuai kebutuhan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($products as $product)
            <!-- Product Card -->
            <div class="group bg-[#E8E8E4] overflow-hidden hover:bg-[#DEDED8] transition-all duration-300 border border-[#D0D0CC] flex flex-col">
                <a href="{{ route('katalog.show', $product) }}" class="block aspect-[4/5] relative overflow-hidden bg-[#D8D8D4]">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1628891435222-06592ce29663?q=80&w=600&auto=format&fit=crop' }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $product->name }}">
                    <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/20 transition-all duration-300 flex items-center justify-center">
                        <span class="btn-dark opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 text-sm py-3 px-5">
                            Lihat Detail
                        </span>
                    </div>

                </a>
                <div class="p-6 flex flex-col flex-1">
                    <a href="{{ route('katalog.show', $product) }}">
                        <h3 class="text-2xl font-bold text-[#1A1A1A] uppercase font-['Teko'] mb-2 group-hover:text-[#6B6B6B] transition-colors leading-tight">{{ $product->name }}</h3>
                    </a>
                    <p class="text-[#6B6B6B] text-sm font-['Rajdhani'] font-medium line-clamp-2">{{ $product->description }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10">
                <p class="text-[#6B6B6B] font-['Rajdhani']">Belum ada produk unggulan saat ini.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ url('/katalog') }}" class="btn-outline gap-2 inline-flex">
                Lihat Semua Katalog
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>
