@props(['portfolios' => []])
<section id="portfolio" class="py-24 bg-[#E8E8E4]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 border-b border-[#D0D0CC] pb-8 gap-6">
            <div>
                <p class="text-[#6B6B6B] text-xs font-bold tracking-widest uppercase mb-3 font-['Rajdhani']">✦ Portofolio</p>
                <h2 class="text-5xl md:text-7xl font-extrabold text-[#1A1A1A] uppercase font-['Teko'] leading-none">Karya<br><span class="text-[#6B6B6B]">Kami</span></h2>
            </div>
            <div class="flex flex-col gap-3">
                <p class="text-[#6B6B6B] max-w-sm text-base font-['Rajdhani'] font-medium leading-relaxed">Hasil produksi nyata yang telah kami selesaikan untuk berbagai tim olahraga di seluruh Indonesia.</p>
                <a href="https://instagram.com" target="_blank" class="inline-flex items-center gap-2 text-[#1A1A1A] hover:text-[#6B6B6B] font-semibold transition-colors font-['Rajdhani'] uppercase tracking-wider text-sm">
                    Follow Instagram Kami
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
            </div>
        </div>

        @php
            $initialPortfolios = $portfolios->take(4);
            $allImages = $portfolios->map(function($p) { return Storage::url($p->image); })->toArray();
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-4 gap-2" id="portfolio-grid">
            @forelse($initialPortfolios as $index => $portfolio)
            <!-- Portfolio Item -->
            <div class="aspect-square bg-[#D8D8D4] overflow-hidden group relative portfolio-slot">
                <img src="{{ Storage::url($portfolio->image) }}" alt="Portfolio" class="portfolio-img absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-90">
                <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/10 transition-all duration-300"></div>
            </div>
            @empty
            <div class="col-span-full text-center py-10">
                <p class="text-[#6B6B6B] font-['Rajdhani']">Belum ada karya portofolio yang ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@if(count($allImages) > 4)
<script>
document.addEventListener("DOMContentLoaded", function() {
    const allImages = @json($allImages);
    const slots = document.querySelectorAll('.portfolio-slot');
    
    // Set interval untuk animasi ganti gambar acak
    setInterval(() => {
        // Pilih slot acak (0 sampai 3)
        const randomSlotIndex = Math.floor(Math.random() * slots.length);
        const slot = slots[randomSlotIndex];
        const imgEl = slot.querySelector('.portfolio-img');
        
        // Dapatkan gambar yang sedang tampil
        const currentDisplayed = Array.from(document.querySelectorAll('.portfolio-img')).map(img => img.getAttribute('src'));
        
        // Cari gambar yang belum tampil
        const availableImages = allImages.filter(src => !currentDisplayed.includes(src));
        
        if (availableImages.length > 0) {
            // Pilih satu gambar baru secara acak
            const randomNewImage = availableImages[Math.floor(Math.random() * availableImages.length)];
            
            // Efek fade out
            imgEl.style.opacity = 0;
            
            // Tunggu sebentar, lalu ganti source gambar dan fade in
            setTimeout(() => {
                imgEl.src = randomNewImage;
                imgEl.style.opacity = 0.9;
            }, 500); // 500ms adalah setengah dari durasi transisi
        }
    }, 4000); // Lakukan pergantian setiap 4 detik
});
</script>
@endif
