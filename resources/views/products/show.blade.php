@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start mb-20">

    {{-- GAMBAR PRODUK --}}
    <div>
        <img src="{{ asset($product->image) }}"
             class="w-full h-96 object-cover rounded-3xl shadow-xl"
             alt="{{ $product->name }}">
    </div>

    {{-- DETAIL PRODUK --}}
    <div>
        <h1 class="text-4xl font-bold mb-3">{{ $product->name }}</h1>

        <p class="text-neutral-600 text-lg mb-4">
            {{ $product->description }}
        </p>

        <span class="text-3xl font-bold text-amber-700 block mb-6">
            {{ $product->formatted_price }}
        </span>

        {{-- BUTTON KERANJANG --}}
        <div class="flex gap-4">
            <button class="bg-black text-white px-6 py-3 rounded-full text-lg hover:bg-amber-700 transition">
                Tambah ke Keranjang
            </button>

            <a href="{{ route('menu.index') }}"
               class="px-6 py-3 rounded-full border border-neutral-400 hover:bg-neutral-200 transition text-lg">
                Kembali
            </a>
        </div>

        {{-- INFO TAMBAHAN --}}
        <div class="mt-10 text-neutral-500">
            <p>Kategori: <span class="font-medium text-black">{{ $product->category->name }}</span></p>
            <p>Rating: ⭐⭐⭐⭐⭐ (dummy)</p>
        </div>
    </div>

</div>

@endsection
