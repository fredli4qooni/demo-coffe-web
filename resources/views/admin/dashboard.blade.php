@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white shadow rounded-xl p-6">
        <p class="text-sm text-neutral-500 mb-2">Total Produk</p>
        <p class="text-3xl font-bold">{{ $product_count }}</p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <p class="text-sm text-neutral-500 mb-2">Total Kategori</p>
        <p class="text-3xl font-bold">{{ $category_count }}</p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <p class="text-sm text-neutral-500 mb-2">Selamat Datang</p>
        <p class="text-lg">Panel admin NatsuCaffe.</p>
    </div>

</div>

@endsection
