<nav class="fixed w-full z-50 bg-[#0f172a]/80 backdrop-blur-md border-b border-slate-800 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="#" class="text-2xl font-extrabold tracking-tight text-white font-['Outfit']">
                    ARMOR<span class="text-neon-green">.</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ url('/') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Home</a>
                <a href="{{ url('/katalog') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Katalog</a>
                <a href="{{ url('/preview-custom') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Custom Jersey</a>
                <a href="{{ url('/request-order') }}" class="bg-neon-green text-black px-5 py-2 rounded-full text-sm font-bold hover:bg-[#32e612] transition-colors shadow-neon">
                    Request Order
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-slate-300 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
