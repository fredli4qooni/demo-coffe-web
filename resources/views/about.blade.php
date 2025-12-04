@extends('layouts.app')

@section('content')

<section class="mb-20">
    <h1 class="text-4xl font-bold mb-6 text-amber-700">Tentang Kami</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        {{-- TEXT --}}
        <div>
            <p class="text-neutral-700 text-lg leading-relaxed mb-4">
                CoffeeShop adalah UMKM kopi modern di Bandar Lampung yang berfokus pada
                penyajian kopi berkualitas tinggi dari biji pilihan. Kami percaya bahwa
                setiap cangkir kopi memiliki cerita, dan kami ingin memberikan pengalaman
                terbaik kepada setiap pelanggan.
            </p>

            <p class="text-neutral-700 text-lg leading-relaxed mb-4">
                Semua produk kami dibuat oleh barista profesional dengan passion
                terhadap seni meracik kopi. Kami menggunakan bahan terbaik,
                roasted fresh, dan disajikan dengan penuh cinta.
            </p>

            <p class="text-neutral-700 text-lg leading-relaxed">
                Terima kasih telah mendukung UMKM lokal! ☕❤️
            </p>
        </div>

        {{-- IMAGE --}}
        <div>
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=1200"
                class="rounded-3xl shadow-xl object-cover w-full h-96">
        </div>

    </div>
</section>

@endsection
