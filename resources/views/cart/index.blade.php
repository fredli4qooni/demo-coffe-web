@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Keranjang Belanja</h1>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg shadow-sm">
            <strong class="font-bold">Info:</strong>
            <span class="block sm:inline ml-1">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('cart'))
    <div class="bg-white rounded-lg shadow-lg p-6">
        <table class="w-full">
            <thead>
                <tr class="border-b text-left text-neutral-500">
                    <th class="pb-4">Produk</th>
                    <th class="pb-4">Harga</th>
                    <th class="pb-4">Qty</th>
                    <th class="pb-4">Subtotal</th>
                    <th class="pb-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $details)
                    @php 
                        $subtotal = $details['price'] * $details['quantity']; 
                        $total += $subtotal;
                    @endphp
                    <tr class="border-b last:border-0">
                        <td class="py-4 flex items-center gap-4">
                            @if($details['image'])
                                <img src="{{ asset($details['image']) }}" class="w-16 h-16 object-cover rounded-lg">
                            @endif
                            <span class="font-medium">{{ $details['name'] }}</span>
                        </td>
                        <td class="py-4">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                        <td class="py-4">{{ $details['quantity'] }}</td>
                        <td class="py-4 font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td class="py-4">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 flex justify-between items-center border-t pt-6">
            <h3 class="text-2xl font-bold">Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
            <div class="flex gap-4">
                <a href="{{ route('menu.index') }}" class="px-6 py-3 border rounded-full hover:bg-gray-100">Lanjut Belanja</a>
                {{-- Tombol Checkout akan kita buat logikanya setelah ini --}}
                <button class="bg-black text-white px-8 py-3 rounded-full font-bold hover:bg-gray-800">
                    Checkout Sekarang
                </button>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-20">
        <h2 class="text-2xl font-bold text-gray-400">Keranjang Masih Kosong</h2>
        <a href="{{ route('menu.index') }}" class="mt-4 inline-block bg-black text-white px-6 py-3 rounded-full">Mulai Pesan</a>
    </div>
    @endif
</div>
@endsection