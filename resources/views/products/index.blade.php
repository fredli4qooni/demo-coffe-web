@extends('layouts.app')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    @if (session('success'))
        <div
            class="mb-6 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg flex justify-between items-center shadow-sm">
            <div>
                <strong class="font-bold">Berhasil!</strong>
                <span class="ml-1">{{ session('success') }}</span>
            </div>
            <a href="{{ route('cart.index') }}" class="underline font-bold hover:text-green-900">Lihat Keranjang</a>
        </div>
    @endif
    
    <h1 class="text-3xl font-bold mb-8">Menu Kami</h1>

    @foreach ($categories as $category)
        <h2 class="text-2xl font-semibold mb-4 text-amber-700">{{ $category->name }}</h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">

            @foreach ($category->products as $product)
                <div class="bg-white shadow rounded-xl overflow-hidden hover:shadow-xl transition group flex flex-col">

                    <div class="relative">
                        <img src="{{ asset($product->image) }}"
                            class="h-48 w-full object-cover group-hover:scale-105 transition duration-300"
                            alt="{{ $product->name }}">

                        <span class="absolute top-2 right-2 bg-black text-white text-xs py-1 px-3 rounded-full shadow">
                            {{ $product->formatted_price }}
                        </span>
                    </div>

                    <div class="p-4 flex flex-col flex-grow">

                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>

                        <p class="text-neutral-500 text-sm mb-4">
                            {{ Str::limit($product->description, 60) }}
                        </p>

                        <div class="flex flex-col gap-2 mt-auto">

                            <a href="{{ route('product.show', $product->id) }}"
                                class="bg-amber-600 text-white py-2 rounded-full text-center text-sm hover:bg-amber-700 transition">
                                Lihat Detail
                            </a>

                            <a href="{{ route('cart.add', $product->id) }}"
                                class="bg-black text-white py-2 rounded-full text-center text-sm hover:bg-amber-700 transition cursor-pointer">
                                Tambah ke Keranjang
                            </a>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    @endforeach
@endsection
