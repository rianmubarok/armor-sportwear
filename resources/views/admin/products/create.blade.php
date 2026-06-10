@extends('layouts.admin')

@section('page-title', 'Tambah Produk')
@section('page-subtitle', 'Isi formulir untuk menambahkan katalog produk baru')

@section('content')
<div class="w-full">

    {{-- Back link --}}
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-[#9A9A9A] hover:text-[#1A1A1A] transition text-xs font-bold uppercase tracking-widest font-['Rajdhani'] mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar
    </a>

    <div class="bg-white border border-[#D0D0CC]">
        <div class="p-6 border-b border-[#D0D0CC]">
            <h2 class="text-2xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none">Form Produk Baru</h2>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="admin-label">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    placeholder="Contoh: Esports Pro Series"
                    class="admin-input @error('name') border-red-400 @enderror">
                @error('name') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
            </div>

            {{-- Category & Price --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="category" class="admin-label">Kategori (Opsional)</label>
                    <input type="text" name="category" id="category" value="{{ old('category') }}"
                        placeholder="Esport, Sepakbola, Basket..."
                        class="admin-input @error('category') border-red-400 @enderror">
                    @error('category') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="price_start_from" class="admin-label">Harga Mulai Dari (Rp) - Opsional</label>
                    <input type="number" name="price_start_from" id="price_start_from"
                        value="{{ old('price_start_from') }}" min="0"
                        class="admin-input @error('price_start_from') border-red-400 @enderror">
                    @error('price_start_from') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="admin-label">Deskripsi Produk</label>
                <textarea name="description" id="description" rows="5" required
                    placeholder="Deskripsikan produk ini secara detail..."
                    class="admin-input @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
            </div>

            {{-- Image --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="image" class="admin-label">Gambar Utama Produk</label>
                    <div class="border-2 border-dashed border-[#D0D0CC] bg-[#F8F8F6] hover:bg-[#F2F2F0] transition p-6 text-center cursor-pointer" onclick="document.getElementById('image').click()">
                        <svg class="mx-auto h-10 w-10 text-[#C0C0BB] mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-sm font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-wider">Klik untuk unggah utama</p>
                        <p class="text-xs text-[#9A9A9A] font-['Rajdhani'] mt-1">Wajib (Max 20MB)</p>
                        <input type="file" name="image" id="image" accept="image/*" required class="hidden"
                               onchange="previewImage(this)">
                    </div>
                    <div id="image-preview" class="mt-3 hidden">
                        <img id="preview-img" src="" alt="Preview" class="h-32 object-cover border border-[#D0D0CC]">
                    </div>
                    @error('image') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="gallery_images" class="admin-label">Gambar Galeri (Opsional)</label>
                    <div class="border-2 border-dashed border-[#D0D0CC] bg-[#F8F8F6] hover:bg-[#F2F2F0] transition p-6 text-center cursor-pointer" onclick="document.getElementById('gallery_images').click()">
                        <svg class="mx-auto h-10 w-10 text-[#C0C0BB] mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-sm font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-wider">Klik untuk tambah galeri</p>
                        <p class="text-xs text-[#9A9A9A] font-['Rajdhani'] mt-1">Bisa pilih banyak gambar sekaligus</p>
                        <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple class="hidden"
                               onchange="updateGalleryCount(this)">
                    </div>
                    <div id="gallery-info" class="mt-2 text-sm text-[#9A9A9A] font-['Rajdhani'] font-medium hidden">
                        <span id="gallery-count">0</span> gambar dipilih
                    </div>
                    @error('gallery_images.*') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Actions --}}
            <div class="pt-4 flex flex-col sm:flex-row justify-end gap-3 border-t border-[#D0D0CC]">
                <a href="{{ route('admin.products.index') }}" class="admin-btn-outline">Batal</a>
                <button type="submit" class="admin-btn">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function updateGalleryCount(input) {
    const count = input.files ? input.files.length : 0;
    const infoDiv = document.getElementById('gallery-info');
    const countSpan = document.getElementById('gallery-count');
    
    if (count > 0) {
        countSpan.textContent = count;
        infoDiv.classList.remove('hidden');
    } else {
        infoDiv.classList.add('hidden');
    }
}
</script>
@endsection
