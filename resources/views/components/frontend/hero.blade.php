<section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-slate-900">
    <!-- Abstract Background Shapes (Removed Blur & Glow) -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <!-- Grid pattern -->
        <div class="absolute inset-0" style="background-image: radial-gradient(#334155 1px, transparent 1px); background-size: 40px 40px; opacity: 0.2;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-4xl mx-auto">
            <span class="inline-block py-1 px-3 bg-slate-800 border border-slate-700 text-[#39ff14] text-xs font-semibold tracking-wider uppercase mb-6">
                #1 Vendor Jersey Custom
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-8 leading-tight">
                Dominasi Permainan Dengan <br>
                <span class="text-[#39ff14]">Armor Premium</span>
            </h1>
            <p class="mt-4 text-xl text-slate-400 mb-10 max-w-2xl mx-auto">
                Berdiri sejak 2022, Armor Sportwear siap mewujudkan jersey impian tim Anda dengan material terbaik, desain eksklusif, dan kualitas jahitan standar profesional.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/katalog') }}" class="bg-[#39ff14] text-black px-8 py-4 text-base font-bold hover:bg-[#32e612] transition-colors flex items-center justify-center gap-2">
                    Lihat Katalog 
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="{{ url('/request-order') }}" class="bg-slate-800 text-white border border-slate-700 px-8 py-4 text-base font-bold hover:bg-slate-700 transition-colors flex items-center justify-center">
                    Pesan Sekarang
                </a>
            </div>
        </div>
        
        <!-- Dashboard/Hero Image Mockup -->
        <div class="mt-20 relative mx-auto w-full max-w-5xl">
            <div class="aspect-video bg-slate-800 border border-slate-700 overflow-hidden relative flex items-center justify-center group">
                <!-- Unsplash Hero Image -->
                <img src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=1600&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700" alt="Jersey Showcase">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
            </div>
        </div>
    </div>
</section>
