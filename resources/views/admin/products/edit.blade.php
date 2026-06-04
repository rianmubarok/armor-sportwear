@extends('layouts.admin')

@section('page-title', 'Edit Produk')
@section('page-subtitle', 'Perbarui data katalog produk')

@section('content')
<div class="max-w-3xl">

    {{-- Back link --}}
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-[#9A9A9A] hover:text-[#1A1A1A] transition text-xs font-bold uppercase tracking-widest font-['Rajdhani'] mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar
    </a>

    <div class="bg-white border border-[#D0D0CC]">
        <div class="p-6 border-b border-[#D0D0CC] flex items-center gap-4">
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                 class="w-12 h-12 object-cover border border-[#D0D0CC] shrink-0">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none">Edit: {{ $product->name }}</h2>
                <p class="text-xs text-[#9A9A9A] font-['Rajdhani'] mt-0.5">{{ $product->slug }}</p>
            </div>
        </div>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div>
                <label for="name" class="admin-label">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                    class="admin-input @error('name') border-red-400 @enderror">
                @error('name') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
            </div>

            {{-- Category & Price --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="category" class="admin-label">Kategori (Opsional)</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}"
                        class="admin-input @error('category') border-red-400 @enderror">
                    @error('category') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="price_start_from" class="admin-label">Harga Mulai Dari (Rp) - Opsional</label>
                    <input type="number" name="price_start_from" id="price_start_from"
                        value="{{ old('price_start_from', $product->price_start_from) }}" min="0"
                        class="admin-input @error('price_start_from') border-red-400 @enderror">
                    @error('price_start_from') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="admin-label">Deskripsi Produk</label>
                <textarea name="description" id="description" rows="5" required
                    class="admin-input @error('description') border-red-400 @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
            </div>

            {{-- Image --}}
            <div>
                <label class="admin-label">Gambar Produk Saat Ini</label>
                @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="Preview"
                         class="h-32 object-cover border border-[#D0D0CC] mb-4" id="current-img">
                @endif

                <label for="image" class="admin-label mt-4">Ganti Gambar (Opsional)</label>
                <div class="border-2 border-dashed border-[#D0D0CC] bg-[#F8F8F6] hover:bg-[#F2F2F0] transition p-6 text-center cursor-pointer" onclick="document.getElementById('image').click()">
                    <svg class="mx-auto h-8 w-8 text-[#C0C0BB] mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-sm font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-wider">Klik untuk ganti gambar</p>
                    <p class="text-xs text-[#9A9A9A] font-['Rajdhani'] mt-1">JPG, PNG, WEBP — Maks 2MB</p>
                    <input type="file" name="image" id="image" accept="image/*" class="hidden"
                           onchange="previewImage(this)">
                </div>
                <div id="image-preview" class="mt-3 hidden">
                    <p class="text-[10px] text-[#9A9A9A] font-bold uppercase tracking-wider font-['Rajdhani'] mb-1">Preview Baru:</p>
                    <img id="preview-img" src="" alt="Preview" class="h-32 object-cover border border-[#D0D0CC]">
                </div>
                @error('image') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
            </div>

            {{-- Actions --}}
            <div class="pt-4 flex flex-col sm:flex-row justify-between gap-3 border-t border-[#D0D0CC]">
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                      onsubmit="return confirm('Hapus produk ini secara permanen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Hapus Produk
                    </button>
                </form>

                <div class="flex gap-3">
                    <a href="{{ route('admin.products.index') }}" class="admin-btn-outline">Batal</a>
                    <button type="submit" class="admin-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Perbarui Produk
                    </button>
                </div>
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
</script>
@endsection
