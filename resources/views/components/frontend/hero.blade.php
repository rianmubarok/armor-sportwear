@props(['heroImages' => collect()])

@php
    $defaultImage = 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=1800&auto=format&fit=crop';
    
    $allImages = [];
    $initialImage = $defaultImage;
    
    if($heroImages->count() > 0) {
        $allImages = $heroImages->map(function($img) { return Storage::url($img->image); })->toArray();
        $initialImage = $allImages[0];
    }
@endphp

<section class="relative pt-32 pb-0 overflow-hidden bg-[#F2F2F0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-5xl">
            <!-- Badge -->
            <span class="inline-flex items-center gap-2 py-1.5 px-4 bg-[#E8E8E4] border border-[#D0D0CC] text-[#1A1A1A] text-xs font-bold tracking-widest uppercase mb-8 font-['Rajdhani']">
                ✦ Jasa Pembuatan Jersey Custom — Jepara
            </span>

            <!-- Main Heading -->
            <h1 class="text-[clamp(4rem,12vw,9rem)] font-extrabold text-[#1A1A1A] leading-[0.9] uppercase mb-6 font-['Teko']">
                Jersey Custom<br>
                <span class="text-[#6B6B6B]">Terbaik</span>
            </h1>

            <!-- Subheading inline with image -->
            <div class="flex flex-col md:flex-row md:items-end gap-8 mb-0">
                <p class="text-[#6B6B6B] text-xl max-w-lg leading-relaxed font-['Rajdhani'] font-medium md:mb-12">
                    Berdiri sejak 2022, Armor Sportwear siap mewujudkan jersey impian tim Anda dengan material terbaik, desain eksklusif, dan kualitas jahitan standar profesional.
                </p>
                <div class="flex gap-4 mb-12 shrink-0">
                    <a href="{{ url('/katalog') }}" class="btn-dark gap-2">
                        Lihat Katalog
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="#kontak" class="btn-outline">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Image -->
    <div class="relative w-full mt-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden bg-[#D8D8D4]" style="height: 55vw; max-height: 600px; min-height: 280px;">
                <img
                    id="dynamic-hero-img"
                    src="{{ $initialImage }}"
                    class="w-full h-full object-cover transition-opacity duration-1000 opacity-90"
                    alt="Armor Sportwear Jersey"
                >
                <!-- Dark CTA overlay on image bottom-left -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-[#1A1A1A]/70 via-transparent to-transparent p-8 flex items-end justify-between pointer-events-none">
                    <p class="text-white text-2xl font-bold font-['Teko'] uppercase tracking-wide">Material Premium, <span class="text-white/70">Jahitan Profesional</span></p>
                    <span class="text-white/60 text-sm font-['Rajdhani'] font-semibold uppercase tracking-widest">Berdiri 2022</span>
                </div>
            </div>
        </div>
    </div>
</section>

@if(count($allImages) > 1)
<script>
document.addEventListener("DOMContentLoaded", function() {
    const allImages = @json($allImages);
    const imgEl = document.getElementById('dynamic-hero-img');
    
    let currentIndex = 0;
    
    setInterval(() => {
        // Pilih gambar selanjutnya
        currentIndex = (currentIndex + 1) % allImages.length;
        const newImage = allImages[currentIndex];
        
        // Efek fade out
        imgEl.style.opacity = 0;
        
        // Ganti gambar dan fade in setelah setengah detik
        setTimeout(() => {
            imgEl.src = newImage;
            imgEl.style.opacity = 0.9;
        }, 500);
    }, 5000); // Ganti setiap 5 detik
});
</script>
@endif
