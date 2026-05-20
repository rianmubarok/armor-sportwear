@extends('layouts.public')

@section('content')
<div class="pt-32 pb-24 bg-[#0f172a] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <a href="{{ route('katalog') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Katalog
            </a>
        </div>

        <div class="bg-slate-800  border border-slate-700 overflow-hidden ">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                
                {{-- Image Section --}}
                <div class="aspect-square lg:aspect-auto bg-slate-900 relative">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
                </div>

                {{-- Detail Section --}}
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <div class="mb-2">
                        <span class="bg-slate-700 text-slate-300 text-xs font-semibold px-3 py-1  uppercase tracking-wider">
                            {{ $product->category }}
                        </span>
                    </div>
                    
                    <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 font-['Outfit']">{{ $product->name }}</h1>
                    
                    <div class="mb-8 pb-8 border-b border-slate-700">
                        <span class="text-slate-400 block mb-1">Estimasi Harga Mulai</span>
                        <span class="text-4xl font-bold text-neon-green">Rp {{ number_format($product->price_start_from, 0, ',', '.') }}</span>
                        <p class="text-xs text-slate-500 mt-2">*Harga akhir menyesuaikan dengan bahan, sablon, dan tingkat kesulitan custom.</p>
                    </div>

                    <div class="prose prose-invert prose-slate mb-10 max-w-none">
                        <h3 class="text-lg font-bold text-white mb-2 font-['Outfit']">Deskripsi & Detail</h3>
                        <p class="text-slate-300 leading-relaxed whitespace-pre-line">{{ $product->description }}</p>
                    </div>

                    <div class="mt-auto">
                        @php
                            $waText = "Halo Armor Sportwear, saya tertarik untuk custom jersey dengan referensi model *" . $product->name . "*. Bisa minta info lebih lanjut?";
                        @endphp
                        <a href="https://wa.me/6285718516143?text={{ urlencode($waText) }}" target="_blank"
                           class="w-full flex items-center justify-center gap-3 bg-neon-green text-black px-8 py-4  text-lg font-bold hover:bg-[#32e612] transition-colors  group">
                            <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Konsultasi Custom via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
