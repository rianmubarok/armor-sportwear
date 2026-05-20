@extends('layouts.admin')

@section('page-title', 'Tambah Produk Baru')
@section('page-subtitle', 'Isi formulir di bawah ini untuk menambahkan katalog produk baru.')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 max-w-3xl">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Form Produk</h2>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror">
            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        {{-- Category & Price --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <input type="text" name="category" id="category" value="{{ old('category') }}" placeholder="Contoh: Esport, Sepakbola" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('category') border-red-500 @enderror">
                @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label for="price_start_from" class="block text-sm font-medium text-gray-700 mb-1">Harga Mulai Dari (Rp)</label>
                <input type="number" name="price_start_from" id="price_start_from" value="{{ old('price_start_from', 0) }}" min="0" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('price_start_from') border-red-500 @enderror">
                @error('price_start_from') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Produk</label>
            <textarea name="description" id="description" rows="4" required
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        {{-- Image --}}
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
            <input type="file" name="image" id="image" accept="image/*" required
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            <p class="mt-2 text-xs text-gray-500">Format yang didukung: JPG, PNG, WEBP. Maks 2MB.</p>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-200">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-sm">Simpan Produk</button>
        </div>
    </form>
</div>
@endsection
