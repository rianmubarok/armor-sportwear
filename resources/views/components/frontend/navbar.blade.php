<nav class="fixed w-full z-50 bg-[#F2F2F0]/95 backdrop-blur-sm border-b border-[#D0D0CC] transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-18 py-4">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="text-3xl font-bold tracking-wide text-[#1A1A1A] font-['Teko'] uppercase leading-none">
                    ARMOR<span class="text-[#1A1A1A]">.</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ url('/katalog') }}" class="text-[#1A1A1A] hover:text-[#6B6B6B] transition-colors text-sm font-semibold uppercase tracking-wider font-['Rajdhani']">Katalog</a>
                <a href="{{ route('preview-jersey') }}" class="text-[#1A1A1A] hover:text-[#6B6B6B] transition-colors text-sm font-semibold uppercase tracking-wider font-['Rajdhani']">Custom Jersey</a>
                <a href="{{ url('/#kontak') }}" class="bg-[#1A1A1A] text-white px-6 py-2.5 text-sm font-bold hover:bg-[#333] transition-colors uppercase tracking-wider font-['Teko']">
                    Konsultasi
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" id="mobile-menu-btn" class="text-[#1A1A1A] hover:text-[#6B6B6B] focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-[#D0D0CC] pt-4 space-y-2">
            <a href="{{ url('/') }}" class="block text-[#1A1A1A] font-semibold uppercase tracking-wider py-2">Beranda</a>
            <a href="{{ url('/katalog') }}" class="block text-[#1A1A1A] font-semibold uppercase tracking-wider py-2">Katalog</a>
            <a href="{{ route('preview-jersey') }}" class="block text-[#1A1A1A] font-semibold uppercase tracking-wider py-2">Custom Jersey</a>
            <a href="{{ url('/#kontak') }}" class="block bg-[#1A1A1A] text-white text-center py-3 font-bold uppercase tracking-wider mt-2">Konsultasi</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
