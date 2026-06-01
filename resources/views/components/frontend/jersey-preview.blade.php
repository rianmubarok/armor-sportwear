<section class="py-24 bg-[#E8E8E4] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16">

            <!-- Text Content -->
            <div class="lg:w-1/2">
                <p class="text-[#6B6B6B] text-xs font-bold tracking-widest uppercase mb-4 font-['Rajdhani']">✦ Preview Interaktif</p>
                <h2 class="text-5xl md:text-7xl font-extrabold text-[#1A1A1A] uppercase font-['Teko'] leading-none mb-6">Ciptakan<br>Identitas<br><span class="text-[#6B6B6B]">Tim Anda</span></h2>
                <p class="text-[#6B6B6B] text-lg mb-8 leading-relaxed font-['Rajdhani'] font-medium max-w-md">
                    Tidak ada batasan dalam berkarya. Sesuaikan setiap detail jersey mulai dari warna dasar, penempatan logo, hingga font nama pemain.
                </p>

                <ul class="space-y-3 mb-10">
                    <li class="flex items-center gap-3 text-[#1A1A1A] font-['Rajdhani'] font-semibold text-base border-b border-[#D0D0CC] pb-3">
                        <span class="text-[#1A1A1A] font-bold">01</span>
                        Bebas pilih warna tim
                    </li>
                    <li class="flex items-center gap-3 text-[#1A1A1A] font-['Rajdhani'] font-semibold text-base border-b border-[#D0D0CC] pb-3">
                        <span class="text-[#1A1A1A] font-bold">02</span>
                        Custom logo di dada & lengan
                    </li>
                    <li class="flex items-center gap-3 text-[#1A1A1A] font-['Rajdhani'] font-semibold text-base">
                        <span class="text-[#1A1A1A] font-bold">03</span>
                        Pilihan font nama & nomor punggung
                    </li>
                </ul>

                <a href="{{ url('/preview-custom') }}" class="btn-dark inline-flex gap-2">
                    Mulai Custom Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Image/Preview Visual -->
            <div class="lg:w-1/2 w-full">
                <div class="relative overflow-hidden border border-[#D0D0CC]">
                    <div class="aspect-square bg-[#D8D8D4] flex items-center justify-center overflow-hidden relative group">
                        <img src="https://images.unsplash.com/photo-1527347673044-6fbc8d7d2640?q=80&w=600&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-80" alt="Jersey Preview">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1A1A]/50 to-transparent"></div>
                        <a href="{{ url('/preview-custom') }}" class="absolute bottom-8 left-8 right-8">
                            <span class="btn-dark w-full justify-center text-base">Preview 3D Interaktif →</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
