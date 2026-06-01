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
            <!-- Product Card 1 -->
            <div class="group bg-[#E8E8E4] overflow-hidden hover:bg-[#DEDED8] transition-all duration-300 border border-[#D0D0CC]">
                <div class="aspect-[4/5] relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1628891435222-06592ce29663?q=80&w=600&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Esports Jersey">
                    <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/30 transition-all duration-300 flex items-center justify-center">
                        <a href="{{ url('/request-order') }}" class="btn-dark opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 text-sm py-3 px-5">
                            Custom Desain Ini
                        </a>
                    </div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-[#1A1A1A] text-white text-xs px-3 py-1 font-bold uppercase tracking-widest font-['Rajdhani']">Gaming</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-[#1A1A1A] uppercase font-['Teko'] mb-1">Esports Pro Series</h3>
                    <p class="text-[#6B6B6B] text-sm font-['Rajdhani'] font-medium">Full printing, bahan dry-fit premium anti bakteri.</p>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="group bg-[#E8E8E4] overflow-hidden hover:bg-[#DEDED8] transition-all duration-300 border border-[#D0D0CC]">
                <div class="aspect-[4/5] relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1518605368461-1e122221dc31?q=80&w=600&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Football Jersey">
                    <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/30 transition-all duration-300 flex items-center justify-center">
                        <a href="{{ url('/request-order') }}" class="btn-dark opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 text-sm py-3 px-5">
                            Custom Desain Ini
                        </a>
                    </div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-[#1A1A1A] text-white text-xs px-3 py-1 font-bold uppercase tracking-widest font-['Rajdhani']">Football</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-[#1A1A1A] uppercase font-['Teko'] mb-1">FC Striker Edition</h3>
                    <p class="text-[#6B6B6B] text-sm font-['Rajdhani'] font-medium">Pola slim fit dengan sirkulasi udara maksimal.</p>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="group bg-[#E8E8E4] overflow-hidden hover:bg-[#DEDED8] transition-all duration-300 border border-[#D0D0CC]">
                <div class="aspect-[4/5] relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1504450758481-7338eba7524a?q=80&w=600&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Basketball Jersey">
                    <div class="absolute inset-0 bg-[#1A1A1A]/0 group-hover:bg-[#1A1A1A]/30 transition-all duration-300 flex items-center justify-center">
                        <a href="{{ url('/request-order') }}" class="btn-dark opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 text-sm py-3 px-5">
                            Custom Desain Ini
                        </a>
                    </div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-[#1A1A1A] text-white text-xs px-3 py-1 font-bold uppercase tracking-widest font-['Rajdhani']">Basketball</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-[#1A1A1A] uppercase font-['Teko'] mb-1">Hoops Elite</h3>
                    <p class="text-[#6B6B6B] text-sm font-['Rajdhani'] font-medium">Nyaman dan ringan untuk pergerakan bebas.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ url('/katalog') }}" class="btn-outline gap-2 inline-flex">
                Lihat Semua Katalog
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>
