{{-- resources/views/home.blade.php --}}
@extends('layouts.user')

@section('content')

{{-- HERO SECTION --}}
<section class="mb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
                Nikmati <span class="text-amber-700">Kopi Premium</span> di NatsuCaffe
            </h1>

            <p class="text-neutral-600 mb-6 text-lg">
                Kopi pilihan terbaik, fresh roasted setiap hari.
                Rasakan pengalaman ngopi terbaik di Bandar Lampung.
            </p>

            <a href="{{ route('menu.index') }}"
               class="bg-amber-600 text-white px-6 py-3 rounded-full text-lg hover:bg-amber-700 transition">
               Lihat Menu Kami
            </a>
        </div>

        <div>
            <img src="https://images.unsplash.com/photo-1510627498534-cf7e9002facc?w=1000"
                 class="rounded-3xl shadow-xl object-cover w-full h-96">
        </div>
    </div>
</section>


{{-- ⭐ BEST SELLER SECTION --}}
<section class="mb-20">
    <h2 class="text-3xl font-bold mb-6 text-amber-700">Best Seller</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach ($best_sellers as $product)
            <div class="bg-white shadow rounded-xl overflow-hidden hover:shadow-xl transition group flex flex-col">

                {{-- GAMBAR --}}
                <div class="relative">
                    <img src="{{ asset($product->image) }}"
                         class="h-48 w-full object-cover group-hover:scale-105 transition duration-300">

                    <span class="absolute top-2 right-2 bg-black text-white text-xs py-1 px-3 rounded-full shadow">
                        {{ $product->formatted_price }}
                    </span>
                </div>

                {{-- DETAIL --}}
                <div class="p-4 flex flex-col flex-grow">

                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>

                    <p class="text-neutral-500 text-sm mb-4">
                        {{ \Illuminate\Support\Str::limit($product->description, 60) }}
                    </p>

                    <div class="flex flex-col gap-2 mt-auto">
                        <a href="{{ route('product.show', $product->id) }}"
                           class="bg-amber-600 text-white py-2 rounded-full text-center text-sm hover:bg-amber-700 transition">
                           Lihat Detail
                        </a>

                        <button
                            class="bg-black text-white py-2 rounded-full text-sm hover:bg-amber-700 transition">
                            Tambah ke Keranjang
                        </button>
                    </div>

                </div>

            </div>
        @endforeach

    </div>
</section>

@endsection
