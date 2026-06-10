@extends('layouts.admin')

@section('page-title', 'Tambah Pesanan')
@section('page-subtitle', 'Catat pesanan tim/borongan baru')

@section('content')
<div class="w-full">
    <div class="bg-white border border-[#D0D0CC]">
        <div class="px-6 py-4 border-b border-[#D0D0CC] bg-[#F8F8F6]">
            <h2 class="text-xl font-bold text-[#1A1A1A] font-['Teko'] uppercase leading-none">Form Pesanan Utama</h2>
        </div>

        <form action="{{ route('admin.orders.store') }}" method="POST" class="p-6 space-y-8" id="orderForm">
            @csrf

            <!-- Informasi Pemesan -->
            <div>
                <h3 class="text-lg font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase mb-4 pb-2 border-b border-[#E0E0E0]">Informasi Pemesan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="customer_name" class="admin-label">Nama Perwakilan / Tim *</label>
                        <input type="text" name="customer_name" id="customer_name" class="admin-input" value="{{ old('customer_name') }}" required>
                        @error('customer_name') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="customer_phone" class="admin-label">No. WhatsApp/Telepon</label>
                        <input type="text" name="customer_phone" id="customer_phone" class="admin-input" value="{{ old('customer_phone') }}">
                        @error('customer_phone') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="total_price" class="admin-label">Total Keseluruhan (Rp)</label>
                        <input type="number" name="total_price" id="total_price" class="admin-input" value="{{ old('total_price') }}">
                        @error('total_price') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="status" class="admin-label">Status Pesanan *</label>
                        <select name="status" id="status" class="admin-input" required>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending (Menunggu DP/Pembayaran)</option>
                            <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>Diproses (Produksi)</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Selesai (Terkirim)</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Batal</option>
                        </select>
                        @error('status') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="notes" class="admin-label">Catatan Tambahan (Alamat Pengiriman, dll)</label>
                    <textarea name="notes" id="notes" rows="2" class="admin-input">{{ old('notes') }}</textarea>
                    @error('notes') <p class="mt-1 text-sm text-red-500 font-['Rajdhani']">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Rincian Baju / Anggota Tim -->
            <div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 pb-2 border-b border-[#E0E0E0] gap-4">
                    <h3 class="text-lg font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase">Rincian Anggota Tim / Items</h3>
                    
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <label class="flex items-center gap-2 cursor-pointer bg-[#F8F8F6] px-3 py-1.5 border border-[#D0D0CC]">
                            <input type="checkbox" id="toggleNameNumber" class="w-4 h-4 accent-[#1A1A1A]" checked>
                            <span class="text-xs font-bold text-[#1A1A1A] font-['Rajdhani'] uppercase tracking-widest">Aktifkan Nama & Nomor</span>
                        </label>
                        
                        <button type="button" id="addItemBtn" class="bg-[#1A1A1A] text-white px-3 py-1.5 text-xs font-bold font-['Rajdhani'] uppercase tracking-widest hover:bg-[#333333] transition flex items-center gap-1 whitespace-nowrap">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah Baris
                        </button>
                    </div>
                </div>
                
                @error('items') <p class="mb-4 text-sm text-red-500 font-['Rajdhani']">Minimal harus ada 1 item pesanan.</p> @enderror

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="itemsTable">
                        <thead>
                            <tr class="bg-[#F8F8F6] border-b border-[#D0D0CC]">
                                <th class="p-2 text-xs font-bold text-[#6B6B6B] uppercase font-['Rajdhani']">Produk (Dari Katalog)</th>
                                <th class="p-2 text-xs font-bold text-[#6B6B6B] uppercase font-['Rajdhani']">Desain Custom</th>
                                <th class="p-2 text-xs font-bold text-[#6B6B6B] uppercase font-['Rajdhani']">Nama Punggung</th>
                                <th class="p-2 text-xs font-bold text-[#6B6B6B] uppercase font-['Rajdhani'] w-24">Nomor</th>
                                <th class="p-2 text-xs font-bold text-[#6B6B6B] uppercase font-['Rajdhani'] w-24">Ukuran</th>
                                <th class="p-2 text-xs font-bold text-[#6B6B6B] uppercase font-['Rajdhani'] w-20">Qty</th>
                                <th class="p-2 text-xs font-bold text-[#6B6B6B] uppercase font-['Rajdhani'] w-10"></th>
                            </tr>
                        </thead>
                        <tbody id="itemsBody">
                            <!-- Template Row -->
                            <tr class="item-row border-b border-[#E0E0E0]">
                                <td class="p-2">
                                    <select name="items[0][product_id]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]">
                                        <option value="">- Pilih -</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="p-2"><input type="text" name="items[0][custom_design]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" placeholder="Kosongkan jika pilih produk"></td>
                                <td class="p-2"><input type="text" name="items[0][player_name]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" placeholder="Contoh: BUDI"></td>
                                <td class="p-2"><input type="text" name="items[0][player_number]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" placeholder="10"></td>
                                <td class="p-2">
                                    <select name="items[0][size]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]">
                                        <option value="">-</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="3XL">3XL</option>
                                        <option value="4XL">4XL</option>
                                    </select>
                                </td>
                                <td class="p-2"><input type="number" name="items[0][quantity]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" value="1" min="1"></td>
                                <td class="p-2 text-center">
                                    <button type="button" class="text-red-500 hover:text-red-700 transition remove-item-btn" title="Hapus Baris">
                                        <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pt-4 flex gap-3 border-t border-[#D0D0CC]">
                <a href="{{ route('admin.orders.index') }}" class="admin-btn-outline">Batal</a>
                <button type="submit" class="admin-btn">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Pesanan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let itemIndex = 1;
        const tbody = document.getElementById('itemsBody');
        const addItemBtn = document.getElementById('addItemBtn');

        // Product options template
        const productOptions = `
            <option value="">- Pilih -</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ str_replace("'", "\'", $product->name) }}</option>
            @endforeach
        `;

        addItemBtn.addEventListener('click', function() {
            const tr = document.createElement('tr');
            tr.className = 'item-row border-b border-[#E0E0E0]';
            tr.innerHTML = `
                <td class="p-2">
                    <select name="items[${itemIndex}][product_id]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]">
                        ${productOptions}
                    </select>
                </td>
                <td class="p-2"><input type="text" name="items[${itemIndex}][custom_design]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" placeholder="Kosongkan jika pilih produk"></td>
                <td class="p-2"><input type="text" name="items[${itemIndex}][player_name]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" placeholder="Contoh: BUDI"></td>
                <td class="p-2"><input type="text" name="items[${itemIndex}][player_number]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" placeholder="10"></td>
                <td class="p-2">
                    <select name="items[${itemIndex}][size]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]">
                        <option value="">-</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        <option value="3XL">3XL</option>
                        <option value="4XL">4XL</option>
                    </select>
                </td>
                <td class="p-2"><input type="number" name="items[${itemIndex}][quantity]" class="w-full text-sm border border-[#D0D0CC] p-2 focus:outline-none focus:border-[#1A1A1A] bg-[#F8F8F6]" value="1" min="1"></td>
                <td class="p-2 text-center">
                    <button type="button" class="text-red-500 hover:text-red-700 transition remove-item-btn" title="Hapus Baris">
                        <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
            itemIndex++;
        });

        tbody.addEventListener('click', function(e) {
            if (e.target.closest('.remove-item-btn')) {
                const rows = tbody.querySelectorAll('tr.item-row');
                if (rows.length > 1) {
                    e.target.closest('tr').remove();
                } else {
                    alert('Minimal harus ada 1 item pesanan.');
                }
            }
        });

        // Toggle Name and Number inputs
        const toggleNameNumber = document.getElementById('toggleNameNumber');
        function updateNameNumberStatus() {
            const isEnabled = toggleNameNumber.checked;
            const nameInputs = document.querySelectorAll('input[name$="[player_name]"]');
            const numberInputs = document.querySelectorAll('input[name$="[player_number]"]');
            
            nameInputs.forEach(input => {
                input.disabled = !isEnabled;
                if (!isEnabled) input.value = '';
                input.style.backgroundColor = isEnabled ? '#F8F8F6' : '#E0E0E0';
            });
            numberInputs.forEach(input => {
                input.disabled = !isEnabled;
                if (!isEnabled) input.value = '';
                input.style.backgroundColor = isEnabled ? '#F8F8F6' : '#E0E0E0';
            });
        }

        toggleNameNumber.addEventListener('change', updateNameNumberStatus);
        
        // Ensure new rows inherit the current toggle state
        addItemBtn.addEventListener('click', function() {
            updateNameNumberStatus(); // Call after appending to update the newly added row
        });
    });
</script>
@endsection
