@extends('layouts.admin')

@section('page-title', 'Detail Pesanan #ORD-' . str_pad($order->id, 4, '0', STR_PAD_LEFT))
@section('page-subtitle', 'Nota dan rincian item pesanan')

@section('content')
<div class="w-full">
    {{-- Back link --}}
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-2 text-[#9A9A9A] hover:text-[#1A1A1A] transition text-xs font-bold uppercase tracking-widest font-['Rajdhani']">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Daftar
        </a>
        
        <div class="flex gap-2">
            <button onclick="window.print()" class="admin-btn-outline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Cetak Nota
            </button>
            <a href="{{ route('admin.orders.edit', $order) }}" class="admin-btn">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Edit Pesanan
            </a>
        </div>
    </div>

    <!-- Print Area -->
    <div class="print-area bg-white border border-[#D0D0CC] print:border-none p-8 print:p-0">
        
        <!-- Header Nota -->
        <div class="flex justify-between items-start border-b-2 border-[#1A1A1A] pb-6 mb-6">
            <div>
                <h1 class="text-4xl font-bold font-['Teko'] uppercase leading-none tracking-wide text-[#1A1A1A]">Armor Sportwear</h1>
                <p class="text-sm font-['Rajdhani'] text-[#6B6B6B] mt-1">Vendor Pembuatan Jersey Custom Terpercaya</p>
            </div>
            <div class="text-right">
                <h2 class="text-2xl font-bold font-['Teko'] uppercase text-[#1A1A1A]">INVOICE PESANAN</h2>
                <p class="text-sm font-bold font-['Rajdhani'] text-[#6B6B6B]">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</p>
                <p class="text-sm font-['Rajdhani'] text-[#9A9A9A] mt-1">Tgl: {{ $order->created_at->format('d F Y') }}</p>
            </div>
        </div>

        <!-- Info Pelanggan & Pesanan -->
        <div class="grid grid-cols-2 gap-8 mb-8">
            <div>
                <h3 class="text-xs font-bold uppercase tracking-widest font-['Rajdhani'] text-[#9A9A9A] mb-2">Informasi Pelanggan</h3>
                <div class="bg-[#F8F8F6] p-4 border border-[#E0E0E0]">
                    <p class="font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase text-lg">{{ $order->customer_name }}</p>
                    <p class="text-sm text-[#6B6B6B] font-['Rajdhani'] mt-1 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        {{ $order->customer_phone ?: '-' }}
                    </p>
                </div>
            </div>
            <div>
                <h3 class="text-xs font-bold uppercase tracking-widest font-['Rajdhani'] text-[#9A9A9A] mb-2">Status & Pembayaran</h3>
                <div class="bg-[#F8F8F6] p-4 border border-[#E0E0E0] h-full flex flex-col justify-center">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-['Rajdhani'] text-[#6B6B6B]">Status Pekerjaan:</span>
                        @if($order->status === 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-yellow-100 text-yellow-800 uppercase font-['Rajdhani'] tracking-widest">Pending</span>
                        @elseif($order->status === 'processing')
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-blue-100 text-blue-800 uppercase font-['Rajdhani'] tracking-widest">Diproses</span>
                        @elseif($order->status === 'completed')
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 uppercase font-['Rajdhani'] tracking-widest">Selesai</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 uppercase font-['Rajdhani'] tracking-widest">Batal</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-['Rajdhani'] text-[#6B6B6B]">Total Tagihan:</span>
                        <span class="text-xl font-bold font-['Rajdhani'] text-[#1A1A1A]">{{ $order->total_price ? 'Rp ' . number_format($order->total_price, 0, ',', '.') : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if($order->notes)
        <!-- Catatan -->
        <div class="mb-8">
            <h3 class="text-xs font-bold uppercase tracking-widest font-['Rajdhani'] text-[#9A9A9A] mb-2">Catatan Tambahan (Alamat, dll)</h3>
            <div class="bg-[#F8F8F6] p-4 border border-[#E0E0E0]">
                <p class="text-sm text-[#1A1A1A] font-['Rajdhani'] whitespace-pre-line">{{ $order->notes }}</p>
            </div>
        </div>
        @endif

        <!-- Rincian Pemain / Baju -->
        <div>
            @php
                $hasNameOrNumber = $order->items->contains(function($item) {
                    return !empty($item->player_name) || !empty($item->player_number);
                });
            @endphp
            <h3 class="text-xs font-bold uppercase tracking-widest font-['Rajdhani'] text-[#1A1A1A] mb-3">Rincian Order Item / Pemain (Total: {{ $order->items->sum('quantity') }} Pcs)</h3>
            
            <table class="w-full text-left border-collapse border border-[#1A1A1A]">
                <thead>
                    <tr class="bg-[#1A1A1A] text-white">
                        <th class="p-2 border border-[#1A1A1A] text-xs font-bold uppercase font-['Rajdhani'] w-10 text-center">No</th>
                        <th class="p-2 border border-[#1A1A1A] text-xs font-bold uppercase font-['Rajdhani']">Desain / Produk</th>
                        @if($hasNameOrNumber)
                        <th class="p-2 border border-[#1A1A1A] text-xs font-bold uppercase font-['Rajdhani']">Nama Punggung</th>
                        <th class="p-2 border border-[#1A1A1A] text-xs font-bold uppercase font-['Rajdhani'] text-center w-24">Nomor</th>
                        @endif
                        <th class="p-2 border border-[#1A1A1A] text-xs font-bold uppercase font-['Rajdhani'] text-center w-24">Ukuran</th>
                        <th class="p-2 border border-[#1A1A1A] text-xs font-bold uppercase font-['Rajdhani'] text-center w-20">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $index => $item)
                    <tr class="{{ $loop->even ? 'bg-[#F8F8F6]' : 'bg-white' }}">
                        <td class="p-2 border border-[#E0E0E0] text-sm text-center font-['Rajdhani'] text-[#6B6B6B]">{{ $index + 1 }}</td>
                        <td class="p-2 border border-[#E0E0E0] text-sm font-bold font-['Rajdhani'] text-[#1A1A1A] uppercase">
                            {{ $item->product ? $item->product->name : ($item->custom_design ?: 'Custom Design') }}
                        </td>
                        @if($hasNameOrNumber)
                        <td class="p-2 border border-[#E0E0E0] text-sm font-bold font-['Rajdhani'] text-[#1A1A1A] uppercase">
                            {{ $item->player_name ?: '-' }}
                        </td>
                        <td class="p-2 border border-[#E0E0E0] text-lg font-bold font-['Teko'] text-[#1A1A1A] text-center">
                            {{ $item->player_number ?: '-' }}
                        </td>
                        @endif
                        <td class="p-2 border border-[#E0E0E0] text-sm font-bold font-['Rajdhani'] text-[#1A1A1A] text-center">
                            {{ $item->size ?: '-' }}
                        </td>
                        <td class="p-2 border border-[#E0E0E0] text-sm font-bold font-['Rajdhani'] text-[#1A1A1A] text-center">
                            {{ $item->quantity }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer Nota (Hanya Muncul saat diprint) -->
        <div class="hidden print:block mt-16 pt-8 border-t border-[#E0E0E0] text-center text-xs font-['Rajdhani'] text-[#9A9A9A]">
            <p>Terima kasih telah mempercayakan pembuatan jersey tim Anda di Armor Sportwear.</p>
            <p>Dokumen ini adalah bukti rincian sah untuk diproses ke divisi produksi.</p>
        </div>

    </div>
</div>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .print\:border-none {
            border: none !important;
        }
        .print\:p-0 {
            padding: 0 !important;
        }
        .print\:block {
            display: block !important;
        }
        .print-area, .print-area * {
            visibility: visible;
        }
        .print-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
    }
</style>
@endsection
