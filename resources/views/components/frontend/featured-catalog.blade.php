<section id="katalog" class="py-24 bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4">Featured <span class="text-neon-green">Collection</span></h2>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">Inspirasi desain jersey terbaik untuk tim kesayangan Anda. Semua desain dapat di-custom sesuai kebutuhan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Product Card 1 -->
            <div class="group bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden hover:border-neon-green/50 transition-all duration-300">
                <div class="aspect-[4/5] bg-slate-700 relative overflow-hidden">
                    <!-- Placeholder Image -->
                    <div class="absolute inset-0 flex items-center justify-center text-slate-500 font-bold">Image Jersey 1</div>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="{{ url('/request-order') }}" class="bg-white text-black px-6 py-2 rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                            Custom Desain Ini
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-white group-hover:text-neon-green transition-colors">Esports Pro Series</h3>
                        <span class="bg-slate-700 text-xs px-2 py-1 rounded text-slate-300">Gaming</span>
                    </div>
                    <p class="text-slate-400 text-sm">Full printing, bahan dry-fit premium anti bakteri.</p>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="group bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden hover:border-neon-green/50 transition-all duration-300">
                <div class="aspect-[4/5] bg-slate-700 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center text-slate-500 font-bold">Image Jersey 2</div>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="{{ url('/request-order') }}" class="bg-white text-black px-6 py-2 rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                            Custom Desain Ini
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-white group-hover:text-neon-green transition-colors">FC Striker Edition</h3>
                        <span class="bg-slate-700 text-xs px-2 py-1 rounded text-slate-300">Football</span>
                    </div>
                    <p class="text-slate-400 text-sm">Pola slim fit dengan sirkulasi udara maksimal.</p>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="group bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden hover:border-neon-green/50 transition-all duration-300">
                <div class="aspect-[4/5] bg-slate-700 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center text-slate-500 font-bold">Image Jersey 3</div>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="{{ url('/request-order') }}" class="bg-white text-black px-6 py-2 rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                            Custom Desain Ini
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-white group-hover:text-neon-green transition-colors">Hoops Elite</h3>
                        <span class="bg-slate-700 text-xs px-2 py-1 rounded text-slate-300">Basketball</span>
                    </div>
                    <p class="text-slate-400 text-sm">Nyaman dan ringan untuk pergerakan bebas.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ url('/katalog') }}" class="inline-flex items-center gap-2 text-white hover:text-neon-green font-semibold transition-colors border-b border-transparent hover:border-neon-green pb-1">
                Lihat Semua Katalog
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>
