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
                <div class="w-full lg:w-3/5 bg-[#F2F2F0] flex items-center justify-center p-8 relative min-h-[500px]">
                    <div id="canvas-container" class="relative w-full max-w-[500px] aspect-square flex items-center justify-center shadow-sm bg-white border border-[#D0D0CC] overflow-hidden">
                        <canvas id="jersey-canvas"></canvas>
                    </div>
                </div>

                <!-- Controls Area -->
                <div class="w-full lg:w-2/5 p-8 sm:p-10 bg-white border-l border-[#D0D0CC]">
                    <h3 class="text-3xl font-bold text-[#1A1A1A] uppercase font-['Teko'] mb-6 border-b border-[#D0D0CC] pb-4">Kustomisasi Desain</h3>

                    <form id="jersey-form" class="space-y-6">

                        <!-- Pilihan Sisi -->
                        <div>
                            <label class="block text-xs font-bold text-[#1A1A1A] mb-3 uppercase tracking-widest font-['Rajdhani']">Tampilan</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="view_side" value="front" class="form-radio text-[#1A1A1A] bg-white border-[#D0D0CC] focus:ring-[#1A1A1A] h-4 w-4" checked>
                                    <span class="ml-2 text-[#1A1A1A] font-['Rajdhani'] font-semibold">Tampak Depan</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="view_side" value="back" class="form-radio text-[#1A1A1A] bg-white border-[#D0D0CC] focus:ring-[#1A1A1A] h-4 w-4">
                                    <span class="ml-2 text-[#1A1A1A] font-['Rajdhani'] font-semibold">Tampak Belakang</span>
                                </label>
                            </div>
                        </div>

                        <!-- Warna Jersey -->
                        <div>
                            <label class="block text-xs font-bold text-[#1A1A1A] mb-3 uppercase tracking-widest font-['Rajdhani']">Warna Dasar Jersey</label>
                            <input type="color" id="jersey-color" name="jersey_color" value="#ffffff" class="h-10 w-full border border-[#D0D0CC] bg-white shadow-sm cursor-pointer rounded-none">
                        </div>

                        <div id="back-controls" class="hidden space-y-6">
                            <!-- Input Nama -->
                            <div>
                                <label for="player_name" class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest font-['Rajdhani']">Nama Pemain</label>
                                <div class="mt-2">
                                    <input type="text" id="player_name" name="player_name" placeholder="NAMA PEMAIN" maxlength="15" class="block w-full border border-[#D0D0CC] bg-white text-[#1A1A1A] p-2.5 text-sm font-['Rajdhani'] focus:border-[#1A1A1A] focus:outline-none rounded-none">
                                </div>
                            </div>

                            <!-- Input Nomor -->
                            <div>
                                <label for="player_number" class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest font-['Rajdhani']">Nomor Punggung</label>
                                <div class="mt-2">
                                    <input type="number" id="player_number" name="player_number" placeholder="10" min="0" max="99" class="block w-full border border-[#D0D0CC] bg-white text-[#1A1A1A] p-2.5 text-sm font-['Rajdhani'] focus:border-[#1A1A1A] focus:outline-none rounded-none">
                                </div>
                            </div>
                        </div>

                        <div id="front-controls" class="space-y-6">
                            <!-- Upload Logo -->
                            <div>
                                <label class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest mb-3 font-['Rajdhani']">Upload Logo Tim</label>
                                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-[#D0D0CC] border-dashed bg-[#F2F2F0] hover:bg-[#E8E8E4] transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-10 w-10 text-[#6B6B6B]" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-[#6B6B6B] justify-center">
                                            <label for="logo_upload" class="relative cursor-pointer font-bold text-[#1A1A1A] hover:text-[#6B6B6B] font-['Rajdhani'] uppercase tracking-wider">
                                                <span>Unggah file</span>
                                                <input id="logo_upload" name="logo_upload" type="file" class="sr-only" accept="image/png, image/jpeg, image/jpg">
                                            </label>
                                        </div>
                                        <p class="text-xs text-[#6B6B6B] font-['Rajdhani']">PNG, JPG up to 2MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="button" id="btn-save" class="btn-dark w-full justify-center text-base">
                                Simpan Preview
                            </button>
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
<script src="{{ asset('js/jersey-preview.js') }}"></script>
@endpush
