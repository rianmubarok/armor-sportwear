@extends('layouts.admin')

@section('page-title', 'Manajemen Pesanan')
@section('page-subtitle', 'Kelola daftar pesanan yang masuk')

@section('content')
<div class="mb-6 flex justify-between items-end">
    <div>
        <h2 class="text-3xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none">Daftar Pesanan</h2>
    </div>
    <a href="{{ route('admin.orders.create') }}" class="admin-btn">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
        Tambah
    </a>
</div>

@if(session('success'))
<div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
        </div>
        <div class="ml-3">
            <p class="text-sm text-green-700 font-medium font-['Rajdhani']">{{ session('success') }}</p>
        </div>
    </div>
</div>
@endif

<div class="bg-white border border-[#D0D0CC] overflow-x-auto">
    <table class="min-w-full divide-y divide-[#D0D0CC]">
        <thead class="bg-[#F8F8F6]">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-[#6B6B6B] uppercase tracking-wider font-['Rajdhani']">ID / Tgl</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-[#6B6B6B] uppercase tracking-wider font-['Rajdhani']">Pelanggan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-[#6B6B6B] uppercase tracking-wider font-['Rajdhani']">Produk / Desain</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-[#6B6B6B] uppercase tracking-wider font-['Rajdhani']">Total Harga</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-[#6B6B6B] uppercase tracking-wider font-['Rajdhani']">Status</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-[#6B6B6B] uppercase tracking-wider font-['Rajdhani']">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-[#D0D0CC]">
            @forelse($orders as $order)
                <tr class="hover:bg-[#F8F8F6] transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-[#1A1A1A] font-['Teko'] text-lg uppercase">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</div>
                        <div class="text-xs text-[#9A9A9A] font-['Rajdhani']">{{ $order->created_at->format('d M Y') }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase">{{ $order->customer_name }}</div>
                        <div class="text-sm text-[#6B6B6B] font-['Rajdhani']">{{ $order->customer_phone ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        @if($order->items->count() > 0)
                            @php $firstItem = $order->items->first(); @endphp
                            <div class="text-sm font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase">
                                {{ $firstItem->product ? $firstItem->product->name : ($firstItem->custom_design ?: 'Custom Design') }}
                            </div>
                            @if($order->items->count() > 1)
                                <div class="text-xs text-[#9A9A9A] font-['Rajdhani']">+ {{ $order->items->count() - 1 }} item lainnya</div>
                            @endif
                        @else
                            <div class="text-sm text-[#9A9A9A] font-['Rajdhani']">Tidak ada item</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-[#1A1A1A] font-['Rajdhani']">
                            {{ $order->total_price ? 'Rp ' . number_format($order->total_price, 0, ',', '.') : '-' }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($order->status === 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-yellow-100 text-yellow-800 uppercase font-['Rajdhani'] tracking-widest">Pending</span>
                        @elseif($order->status === 'processing')
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-blue-100 text-blue-800 uppercase font-['Rajdhani'] tracking-widest">Diproses</span>
                        @elseif($order->status === 'completed')
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 uppercase font-['Rajdhani'] tracking-widest">Selesai</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 uppercase font-['Rajdhani'] tracking-widest">Batal</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-500 hover:text-blue-700 transition" title="Lihat Detail Nota">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                            <a href="{{ route('admin.orders.edit', $order) }}" class="text-[#1A1A1A] hover:text-[#6B6B6B] transition" title="Edit Pesanan">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data pesanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <p class="text-2xl font-bold text-[#D0D0CC] font-['Teko'] uppercase mb-1">Belum Ada Pesanan</p>
                        <p class="text-sm text-[#9A9A9A] font-['Rajdhani']">Data pesanan masih kosong.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($orders->hasPages())
<div class="mt-6">
    {{ $orders->links('pagination::tailwind') }}
</div>
@endif
@endsection
