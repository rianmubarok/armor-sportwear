@extends('layouts.admin')

@section('page-title', 'Tambah Hero Image Baru')
@section('page-subtitle', 'Unggah gambar utama baru untuk beranda')

@section('content')

<div class="max-w-3xl">
    <a href="{{ route('admin.hero-images.index') }}" class="inline-flex items-center gap-2 text-sm font-bold tracking-widest text-[#9A9A9A] hover:text-[#1A1A1A] transition-colors uppercase font-['Rajdhani'] mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar
    </a>

    <div class="bg-white border border-[#D0D0CC]">
        <div class="p-6 sm:p-8">
            <form action="{{ route('admin.hero-images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Gambar --}}
                <div class="mb-8">
                    <label for="images" class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest font-['Rajdhani'] mb-2">Gambar Hero</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-[#D0D0CC] border-dashed bg-[#F8F8F6] relative overflow-hidden" id="upload-container">
                        <div class="space-y-1 text-center relative z-10" id="upload-placeholder">
                            <svg class="mx-auto h-12 w-12 text-[#9A9A9A]" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-[#6B6B6B] font-['Rajdhani'] justify-center">
                                <label for="images" class="relative cursor-pointer bg-white rounded-md font-bold text-[#1A1A1A] hover:text-[#6B6B6B] focus-within:outline-none px-1">
                                    <span>Upload files</span>
                                    <input id="images" name="images[]" type="file" class="sr-only" accept="image/*" multiple required onchange="previewImages(event)">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-[#9A9A9A] font-['Rajdhani']">PNG, JPG, WEBP up to 2MB. Bisa pilih banyak gambar sekaligus.</p>
                        </div>
                    </div>
                    
                    {{-- Container Preview --}}
                    <div id="preview-container" class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-4 hidden"></div>

                    @error('images')
                        <p class="mt-1.5 text-xs font-bold text-red-600 font-['Rajdhani']">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="mt-1.5 text-xs font-bold text-red-600 font-['Rajdhani']">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center gap-4 pt-6 border-t border-[#D0D0CC]">
                    <button type="submit" class="admin-btn">Simpan Gambar</button>
                    <a href="{{ route('admin.hero-images.index') }}" class="admin-btn-outline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImages(event) {
    const input = event.target;
    const previewContainer = document.getElementById('preview-container');
    
    // Bersihkan preview sebelumnya
    previewContainer.innerHTML = '';
    
    if (input.files && input.files.length > 0) {
        previewContainer.classList.remove('hidden');
        
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-32 object-cover border border-[#D0D0CC] shadow-sm';
                previewContainer.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    } else {
        previewContainer.classList.add('hidden');
    }
}
</script>
@endsection
