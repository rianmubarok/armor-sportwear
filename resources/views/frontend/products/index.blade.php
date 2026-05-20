@extends('layouts.public')

@section('content')
<div class="pt-32 pb-24 bg-[#0f172a] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Katalog <span class="text-neon-green">Produk</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">Pilih dari koleksi desain terbaik kami, atau jadikan sebagai referensi untuk custom jersey impian Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($products as $product)
                <div class="group bg-slate-800  border border-slate-700 overflow-hidden hover:border-neon-green/50 transition-all duration-300 flex flex-col">
                    <a href="{{ route('katalog.show', $product) }}" class="block aspect-[4/5] relative overflow-hidden bg-slate-700">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors duration-300"></div>
                    </a>
                    
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-3">
                            <a href="{{ route('katalog.show', $product) }}">
                                <h3 class="text-xl font-bold text-white group-hover:text-neon-green transition-colors">{{ $product->name }}</h3>
                            </a>
                            <span class="bg-slate-700 text-xs px-2 py-1  text-slate-300 whitespace-nowrap">{{ $product->category }}</span>
                        </div>
                        <p class="text-slate-400 text-sm line-clamp-2 mb-4 flex-1">{{ $product->description }}</p>
                        
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-700">
                            <div>
                                <span class="text-xs text-slate-500 block">Mulai dari</span>
                                <span class="text-lg font-bold text-white">Rp {{ number_format($product->price_start_from, 0, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('katalog.show', $product) }}" class="w-10 h-10  bg-slate-700 flex items-center justify-center text-white group-hover:bg-neon-green group-hover:text-black transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-slate-800/50  border border-slate-700">
                    <p class="text-slate-400 text-lg">Katalog belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="flex justify-center">
            {{ $products->links('pagination::tailwind') }}
        </div>

    </div>
</div>
@endsection
