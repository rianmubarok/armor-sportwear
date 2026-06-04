@extends('layouts.admin')

@section('page-title', 'Edit Portofolio')
@section('page-subtitle', 'Perbarui detail atau gambar portofolio (Karya Kami)')

@section('content')

<div class="max-w-3xl">
    <a href="{{ route('admin.portfolios.index') }}" class="inline-flex items-center gap-2 text-sm font-bold tracking-widest text-[#9A9A9A] hover:text-[#1A1A1A] transition-colors uppercase font-['Rajdhani'] mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar
    </a>

    <div class="bg-white border border-[#D0D0CC]">
        <div class="p-6 sm:p-8">
            <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')



                {{-- Gambar Saat Ini --}}
                <div class="mb-6">
                    <label class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest font-['Rajdhani'] mb-2">Gambar Saat Ini</label>
                    <img src="{{ Storage::url($portfolio->image) }}" alt="Portfolio" class="w-40 h-40 object-cover border border-[#D0D0CC]">
                </div>

                {{-- Gambar Baru (Opsional) --}}
                <div class="mb-8">
                    <label for="image" class="block text-xs font-bold text-[#1A1A1A] uppercase tracking-widest font-['Rajdhani'] mb-2">Ubah Gambar (Opsional)</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-[#D0D0CC] border-dashed bg-[#F8F8F6] relative overflow-hidden" id="upload-container">
                        <div class="space-y-1 text-center relative z-10" id="upload-placeholder">
                            <svg class="mx-auto h-12 w-12 text-[#9A9A9A]" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-[#6B6B6B] font-['Rajdhani'] justify-center">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-bold text-[#1A1A1A] hover:text-[#6B6B6B] focus-within:outline-none px-1">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-[#9A9A9A] font-['Rajdhani']">PNG, JPG, WEBP up to 2MB. Biarkan kosong jika tidak ingin mengubah.</p>
                        </div>
                        <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-contain bg-[#F8F8F6] z-20 pointer-events-none" />
                    </div>
                    @error('image')
                        <p class="mt-1.5 text-xs font-bold text-red-600 font-['Rajdhani']">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center gap-4 pt-6 border-t border-[#D0D0CC]">
                    <button type="submit" class="admin-btn">Perbarui Portofolio</button>
                    <a href="{{ route('admin.portfolios.index') }}" class="admin-btn-outline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('upload-placeholder');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('opacity-0');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
