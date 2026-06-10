@extends('layouts.public')

@section('content')
<div class="bg-[#F2F2F0] py-12 pt-32 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <p class="text-[#6B6B6B] text-xs font-bold tracking-widest uppercase mb-3 font-['Rajdhani']">✦ Alat Desain</p>
            <h1 class="text-5xl md:text-7xl font-extrabold text-[#1A1A1A] uppercase font-['Teko'] leading-none">
                Preview Jersey<br><span class="text-[#6B6B6B]">Interaktif</span>
            </h1>
            <p class="mt-4 text-xl text-[#6B6B6B] font-['Rajdhani'] font-medium">
                Visualisasikan desain custom jersey tim Anda sebelum melakukan pemesanan.
            </p>
        </div>

        <div class="bg-white overflow-hidden border border-[#D0D0CC]">
            <div class="flex flex-col lg:flex-row">

                <!-- Preview Canvas Area -->
                <div class="w-full lg:w-3/5 bg-white flex items-center justify-center">
                    <div id="canvas-container" class="relative w-full aspect-square flex items-center justify-center shadow-sm bg-white overflow-hidden transition-opacity duration-300 ease-in-out" style="opacity: 1;">
                        <canvas id="jersey-canvas"></canvas>
                    </div>
                </div>

                <!-- Controls Area -->
                <div class="w-full lg:w-2/5 p-8 sm:p-10 bg-white border-l border-[#D0D0CC]">
                    <form id="jersey-form" class="space-y-6">

                        <!-- Pilihan Desain -->
                        <div>
                            <label class="block text-xs font-bold text-[#1A1A1A] mb-3 uppercase tracking-widest font-['Rajdhani']">Pilih Desain Jersey</label>
                            <div class="grid grid-cols-3 gap-3">
                                @for($i = 1; $i <= 6; $i++)
                                <label class="cursor-pointer relative group">
                                    <input type="radio" name="jersey_design" value="{{ $i }}" class="peer sr-only" {{ $i == 1 ? 'checked' : '' }}>
                                    <div class="border-2 border-[#D0D0CC] peer-checked:border-[#1A1A1A] group-hover:border-[#1A1A1A] transition-colors bg-[#F2F2F0] aspect-square flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('images/jersey/jersey-'.$i.'-front.png') }}" alt="Desain {{ $i }}" class="w-[80%] h-auto object-contain">
                                    </div>
                                </label>
                                @endfor
                            </div>
                        </div>

                        <!-- Pilihan Warna (Hue) -->
                        <div>
                            <label for="hue_slider" class="block text-xs font-bold text-[#1A1A1A] mb-3 uppercase tracking-widest font-['Rajdhani']">Penyesuaian Warna Dasar</label>
                            <input type="range" id="hue_slider" min="-1" max="1" step="0.01" value="0" class="w-full h-2 bg-[#D0D0CC] rounded-lg appearance-none cursor-pointer accent-[#1A1A1A]">
                            <div class="flex justify-between text-xs text-[#6B6B6B] mt-1 font-['Rajdhani'] uppercase tracking-widest font-bold">
                                <span>Spectrum 1</span>
                                <span>Asli</span>
                                <span>Spectrum 2</span>
                            </div>
                        </div>

                        <!-- Pilihan Sisi -->
                        <div>
                            <label class="block text-xs font-bold text-[#1A1A1A] mb-3 uppercase tracking-widest font-['Rajdhani']">Tampak</label>
                            <div class="flex gap-4">
                                <button type="button" id="btn-view-front" class="flex-1 py-3 px-4 border-2 font-bold uppercase tracking-widest font-['Rajdhani'] text-sm transition-colors border-[#1A1A1A] bg-[#1A1A1A] text-white">Depan</button>
                                <button type="button" id="btn-view-back" class="flex-1 py-3 px-4 border-2 font-bold uppercase tracking-widest font-['Rajdhani'] text-sm transition-colors border-[#D0D0CC] bg-[#F2F2F0] text-[#1A1A1A] hover:border-[#1A1A1A]">Belakang</button>
                            </div>
                        </div>



                        <div id="back-controls" class="space-y-6 transition-opacity duration-300">
                            <!-- Input Nama -->
                            <div>
                                <label for="player_name" class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest font-['Rajdhani']">Nama Pemain</label>
                                <div class="mt-2">
                                    <input type="text" id="player_name" name="player_name" placeholder="NAMA PEMAIN" maxlength="12" class="block w-full border border-[#D0D0CC] bg-white text-[#1A1A1A] p-2.5 text-sm font-['Rajdhani'] focus:border-[#1A1A1A] focus:outline-none rounded-none">
                                </div>
                            </div>

                            <!-- Input Nomor -->
                            <div>
                                <label for="player_number" class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest font-['Rajdhani']">Nomor Punggung</label>
                                <div class="mt-2">
                                    <input type="number" id="player_number" name="player_number" placeholder="10" min="0" max="99" oninput="if(this.value.length > 2) this.value = this.value.slice(0,2);" class="block w-full border border-[#D0D0CC] bg-white text-[#1A1A1A] p-2.5 text-sm font-['Rajdhani'] focus:border-[#1A1A1A] focus:outline-none rounded-none">
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 space-y-3">
                            <button type="button" id="btn-download" class="w-full py-3 border-2 border-[#1A1A1A] text-[#1A1A1A] font-bold uppercase tracking-widest font-['Rajdhani'] text-sm hover:bg-[#F2F2F0] transition-colors flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Unduh Gambar Preview
                            </button>

                            <button type="button" id="btn-save" class="btn-dark w-full justify-center text-xl uppercase font-['Teko'] tracking-widest py-3 mt-2">
                                Pesan Sekarang
                            </button>
                            
                            <p class="text-xs text-center text-[#6B6B6B] font-['Rajdhani'] leading-relaxed pt-2">
                                <span class="text-[#1A1A1A] font-bold">Punya desain sendiri / Sudah ada desain?</span><br>Anda bisa langsung menghubungi kami untuk konsultasi!
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Fabric.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"></script>
<script src="{{ asset('js/jersey-preview.js') }}?v={{ time() }}"></script>
@endpush
