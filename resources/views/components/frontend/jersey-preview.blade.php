<section class="py-24 bg-[#E8E8E4] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16">

            <!-- Text Content -->
            <div class="lg:w-1/2">
                <p class="text-[#6B6B6B] text-xs font-bold tracking-widest uppercase mb-4 font-['Rajdhani']">✦ Desain Sebelum Pesan</p>
                <h2 class="text-5xl md:text-7xl font-extrabold text-[#1A1A1A] uppercase font-['Teko'] leading-none mb-6">Lihat Hasilnya<br>Sebelum<br><span class="text-[#6B6B6B]">Jadi</span></h2>
                <p class="text-[#6B6B6B] text-lg mb-8 leading-relaxed font-['Rajdhani'] font-medium max-w-md">
                    Gunakan alat preview kami untuk melihat tampilan jersey sebelum memesan. Anda bisa mengubah warna, menambah logo, dan memasukkan nama serta nomor pemain secara langsung.
                </p>

                <ul class="space-y-3 mb-10">
                    <li class="flex items-center gap-3 text-[#1A1A1A] font-['Rajdhani'] font-semibold text-base border-b border-[#D0D0CC] pb-3">
                        <span class="text-[#1A1A1A] font-bold">01</span>
                        Pilih template desain jersey favorit Anda
                    </li>
                    <li class="flex items-center gap-3 text-[#1A1A1A] font-['Rajdhani'] font-semibold text-base border-b border-[#D0D0CC] pb-3">
                        <span class="text-[#1A1A1A] font-bold">02</span>
                        Sesuaikan warna jersey menggunakan slider warna
                    </li>
                    <li class="flex items-center gap-3 text-[#1A1A1A] font-['Rajdhani'] font-semibold text-base">
                        <span class="text-[#1A1A1A] font-bold">03</span>
                        Masukkan nama dan nomor punggung pemain
                    </li>
                </ul>

                <a href="{{ route('preview-jersey') }}" class="btn-dark inline-flex gap-2">
                    Coba Alat Preview Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Image/Preview Visual -->
            <div class="lg:w-1/2 w-full">
                <div class="relative overflow-hidden border border-[#D0D0CC]">
                    <div class="aspect-square bg-[#FFFFFF] flex items-center justify-center overflow-hidden relative group">
                        <img src="{{ asset('images/jersey/jersey-1-front.png') }}" class="absolute inset-0 w-full h-full object-contain p-8 group-hover:scale-105 transition-transform duration-700 opacity-90" alt="Jersey Preview">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
