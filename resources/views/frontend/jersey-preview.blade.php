@extends('layouts.public')

@section('content')
<div class="bg-slate-900 py-12 pt-32 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-white sm:text-4xl">
                Preview Jersey Interaktif
            </h1>
            <p class="mt-4 text-xl text-slate-400">
                Visualisasikan desain custom jersey tim Anda sebelum melakukan pemesanan.
            </p>
        </div>

        <div class="bg-slate-800 rounded-2xl shadow-2xl overflow-hidden border border-slate-700">
            <div class="flex flex-col lg:flex-row">
                
                <!-- Preview Canvas Area -->
                <div class="w-full lg:w-3/5 bg-slate-900/50 flex items-center justify-center p-8 relative min-h-[500px]">
                    <div id="canvas-container" class="relative w-full max-w-[500px] aspect-square flex items-center justify-center shadow-lg bg-white rounded-xl border border-slate-600 overflow-hidden">
                        <!-- Canvas background is white for contrast with the jersey -->
                        <canvas id="jersey-canvas"></canvas>
                    </div>
                </div>

                <!-- Controls Area -->
                <div class="w-full lg:w-2/5 p-8 sm:p-10 bg-slate-800">
                    <h3 class="text-xl font-bold text-white mb-6 border-b border-slate-700 pb-4">Kustomisasi Desain</h3>
                    
                    <form id="jersey-form" class="space-y-6">
                        
                        <!-- Pilihan Sisi -->
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Tampilan</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="view_side" value="front" class="form-radio text-neon-green bg-slate-700 border-slate-600 focus:ring-neon-green h-4 w-4" checked>
                                    <span class="ml-2 text-slate-300">Tampak Depan</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="view_side" value="back" class="form-radio text-neon-green bg-slate-700 border-slate-600 focus:ring-neon-green h-4 w-4">
                                    <span class="ml-2 text-slate-300">Tampak Belakang</span>
                                </label>
                            </div>
                        </div>

                        <!-- Warna Jersey -->
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Warna Dasar Jersey</label>
                            <input type="color" id="jersey-color" name="jersey_color" value="#ffffff" class="h-10 w-full rounded-md border-slate-600 bg-slate-700 shadow-sm cursor-pointer">
                        </div>

                        <div id="back-controls" class="hidden space-y-6">
                            <!-- Input Nama -->
                            <div>
                                <label for="player_name" class="block text-sm font-medium text-slate-300">Nama Pemain</label>
                                <div class="mt-1">
                                    <input type="text" id="player_name" name="player_name" placeholder="NAMA PEMAIN" maxlength="15" class="shadow-sm focus:ring-neon-green focus:border-neon-green block w-full sm:text-sm border-slate-600 bg-slate-700 text-white rounded-md p-2">
                                </div>
                            </div>

                            <!-- Input Nomor -->
                            <div>
                                <label for="player_number" class="block text-sm font-medium text-slate-300">Nomor Punggung</label>
                                <div class="mt-1">
                                    <input type="number" id="player_number" name="player_number" placeholder="10" min="0" max="99" class="shadow-sm focus:ring-neon-green focus:border-neon-green block w-full sm:text-sm border-slate-600 bg-slate-700 text-white rounded-md p-2">
                                </div>
                            </div>
                        </div>

                        <div id="front-controls" class="space-y-6">
                            <!-- Upload Logo -->
                            <div>
                                <label class="block text-sm font-medium text-slate-300">Upload Logo Tim</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-600 border-dashed rounded-md bg-slate-700/30 hover:bg-slate-700/50 transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-slate-400 justify-center">
                                            <label for="logo_upload" class="relative cursor-pointer rounded-md font-medium text-neon-green hover:text-[#32e612] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-neon-green">
                                                <span>Unggah file</span>
                                                <input id="logo_upload" name="logo_upload" type="file" class="sr-only" accept="image/png, image/jpeg, image/jpg">
                                            </label>
                                        </div>
                                        <p class="text-xs text-slate-500">PNG, JPG up to 2MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 flex justify-end">
                            <button type="button" id="btn-save" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-bold rounded-md text-black bg-neon-green hover:bg-[#32e612] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neon-green transition-colors w-full">
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
