<section class="py-24 bg-[#0b1121] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <!-- Text Content -->
            <div class="lg:w-1/2">
                <span class="text-neon-green font-bold tracking-wider uppercase text-sm mb-4 block">Interactive Preview</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Create Your <br> Own <span class="text-neon-green">Identity</span></h2>
                <p class="text-slate-400 text-lg mb-8 leading-relaxed">
                    Tidak ada batasan dalam berkarya. Anda dapat menyesuaikan setiap detail jersey mulai dari warna dasar, corak, penempatan logo, hingga font nama pemain.
                </p>
                
                <ul class="space-y-4 mb-10">
                    <li class="flex items-center gap-3 text-slate-300">
                        <div class="w-6 h-6  bg-neon-green/20 flex items-center justify-center text-neon-green shrink-0">✓</div>
                        Bebas pilih warna tim
                    </li>
                    <li class="flex items-center gap-3 text-slate-300">
                        <div class="w-6 h-6  bg-neon-green/20 flex items-center justify-center text-neon-green shrink-0">✓</div>
                        Custom logo di dada & lengan
                    </li>
                    <li class="flex items-center gap-3 text-slate-300">
                        <div class="w-6 h-6  bg-neon-green/20 flex items-center justify-center text-neon-green shrink-0">✓</div>
                        Pilihan font nama & nomor punggung
                    </li>
                </ul>

                <a href="{{ url('/preview-custom') }}" class="inline-block border-2 border-neon-green text-neon-green px-8 py-3  text-base font-bold hover:bg-neon-green hover:text-black transition-all -[0_0_15px_rgba(57,255,20,0.2)]">
                    Mulai Custom Sekarang
                </a>
            </div>

            <!-- Image/Preview Visual -->
            <div class="lg:w-1/2 w-full relative">
                <div class="absolute inset-0 bg-neon-green/10 ] "></div>
                <div class="bg-slate-800 border border-slate-700  p-4 relative z-10 ">
                    <div class="aspect-square bg-slate-900  flex items-center justify-center overflow-hidden relative group">
                        <!-- Mockup placeholder -->
                        <div class="absolute inset-0 opacity-50 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay"></div>
                        <p class="text-slate-500 font-bold text-xl z-10 group-hover:scale-110 transition-transform duration-500">3D Interactive Viewer Placeholder</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
