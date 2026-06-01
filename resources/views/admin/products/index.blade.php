@extends('layouts.admin')

@section('page-title', 'Manajemen Produk')
@section('page-subtitle', 'Kelola semua katalog jersey dan sportwear')

@section('content')

@if(session('success'))
<div class="mb-6 p-4 border-l-4 border-[#1A1A1A] bg-white text-[#1A1A1A] font-['Rajdhani'] font-semibold flex items-center gap-3">
    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    {{ session('success') }}
</div>
@endif

<div class="bg-white border border-[#D0D0CC]">
    {{-- Table Header --}}
    <div class="p-6 border-b border-[#D0D0CC] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none">Daftar Produk</h2>
            <p class="text-xs text-[#9A9A9A] font-['Rajdhani'] font-semibold uppercase tracking-wider mt-0.5">{{ $products->total() }} produk terdaftar</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="admin-btn">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Produk
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#F8F8F6] border-b border-[#D0D0CC]">
                    <th class="px-6 py-4 text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani']">Gambar</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani']">Nama Produk</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani']">Kategori</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani']">Harga Mulai</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-[#9A9A9A] uppercase tracking-widest font-['Rajdhani'] text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#F2F2F0]">
                @forelse($products as $product)
                <tr class="hover:bg-[#F8F8F6] transition group">
                    <td class="px-6 py-4">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                             class="w-14 h-14 object-cover border border-[#D0D0CC]">
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-[#1A1A1A] font-['Teko'] text-lg uppercase leading-tight">{{ $product->name }}</p>
                        <p class="text-xs text-[#9A9A9A] font-['Rajdhani']">{{ $product->slug }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-bold uppercase tracking-widest bg-[#F2F2F0] text-[#1A1A1A] font-['Rajdhani']">
                            {{ $product->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-lg font-bold text-[#1A1A1A] font-['Teko']">Rp {{ number_format($product->price_start_from, 0, ',', '.') }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}" class="admin-btn-outline text-sm py-1.5 px-3">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Hapus produk {{ $product->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn-danger text-sm py-1.5 px-3">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center">
                        <p class="text-4xl font-bold text-[#D0D0CC] font-['Teko'] uppercase mb-2">Belum Ada Produk</p>
                        <p class="text-[#9A9A9A] font-['Rajdhani'] font-medium mb-4">Mulai dengan menambahkan produk pertama Anda.</p>
                        <a href="{{ route('admin.products.create') }}" class="admin-btn inline-flex">Tambah Produk</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="p-6 border-t border-[#D0D0CC]">
        {{ $products->links() }}
    </div>
</div>
@endsection
