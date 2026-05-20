<section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
    <!-- Abstract Background Shapes -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-neon-green/10 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-blue-500/10 blur-[120px]"></div>
        <!-- Grid pattern -->
        <div class="absolute inset-0" style="background-image: radial-gradient(#334155 1px, transparent 1px); background-size: 40px 40px; opacity: 0.2;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-4xl mx-auto">
            <span class="inline-block py-1 px-3 rounded-full bg-slate-800 border border-slate-700 text-neon-green text-xs font-semibold tracking-wider uppercase mb-6">
                #1 Custom Jersey Vendor
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-8 leading-tight">
                Dominate The Game With <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-neon-green to-emerald-400">Premium Armor</span>
            </h1>
            <p class="mt-4 text-xl text-slate-400 mb-10 max-w-2xl mx-auto">
                Wujudkan jersey impian tim Anda dengan material terbaik, desain eksklusif, dan kualitas jahitan standar profesional.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/katalog') }}" class="bg-neon-green text-black px-8 py-4 rounded-full text-base font-bold hover:bg-[#32e612] transition-colors shadow-neon flex items-center justify-center gap-2">
                    Lihat Katalog 
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="{{ url('/request-order') }}" class="bg-slate-800 text-white border border-slate-700 px-8 py-4 rounded-full text-base font-bold hover:bg-slate-700 transition-colors flex items-center justify-center">
                    Request Order
                </a>
            </div>
        </div>
        
        <!-- Dashboard/Hero Image Mockup -->
        <div class="mt-20 relative mx-auto w-full max-w-5xl">
            <div class="aspect-video bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden shadow-2xl relative flex items-center justify-center group">
                <!-- Placeholder for Hero Image -->
                <div class="absolute inset-0 bg-gradient-to-tr from-slate-900 to-slate-800"></div>
                <p class="z-10 text-slate-500 font-['Outfit'] font-bold text-2xl tracking-widest uppercase">Hero Image / 3D Jersey Preview</p>
            </div>
        </div>
    </div>
</section>
