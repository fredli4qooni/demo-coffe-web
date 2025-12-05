@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">

    <div class="flex justify-between items-end mb-6">
        <div>
            <p class="text-sm text-neutral-500">No. Invoice</p>
            <h1 class="text-3xl font-mono font-bold text-amber-700">#{{ $order->invoice_number }}</h1>
        </div>
        
        <div>
            @if($order->status == 'pending')
                <span class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full font-bold">Menunggu Pembayaran</span>
            @elseif($order->status == 'paid')
                <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full font-bold">Lunas / Diproses</span>
            @elseif($order->status == 'completed')
                <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full font-bold">Selesai</span>
            @else
                <span class="bg-red-100 text-red-800 px-4 py-2 rounded-full font-bold">Dibatalkan</span>
            @endif
        </div>
    </div>

    @if($order->status == 'pending')
    <div class="bg-white border-2 border-amber-400 rounded-xl p-6 shadow-lg mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
            ACTION NEEDED
        </div>

        <h2 class="text-xl font-bold mb-4">Instruksi Pembayaran</h2>
        
        <div class="flex flex-col md:flex-row gap-6 items-center">
            
            <div class="w-full md:w-1/3 flex justify-center bg-neutral-50 p-4 rounded-lg">
                @if($order->payment_method == 'qris')
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" class="w-32 h-32 object-contain">
                @else
                    <div class="text-center">
                        <p class="font-bold text-lg uppercase">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                        <p class="text-xs text-neutral-400">Manual Transfer</p>
                    </div>
                @endif
            </div>

            <div class="w-full md:w-2/3 space-y-4">
                
                <div>
                    <p class="text-sm text-neutral-500 mb-1">Silakan transfer ke:</p>
                    <p class="text-2xl font-bold font-mono tracking-wider">
                        @switch($order->payment_method)
                            @case('bank_bca')
                                8830-1234-5678
                                <span class="block text-sm font-sans font-normal text-neutral-600">a.n Natsu Coffee Shop</span>
                                @break
                            @case('bank_bri')
                                0341-01-000123-50-2
                                <span class="block text-sm font-sans font-normal text-neutral-600">a.n Natsu Coffee Shop</span>
                                @break
                            @case('bank_mandiri')
                                123-00-0987654-3
                                <span class="block text-sm font-sans font-normal text-neutral-600">a.n Natsu Coffee Shop</span>
                                @break
                            @case('qris')
                                Scan QR Code di samping
                                <span class="block text-sm font-sans font-normal text-neutral-600">NAMA: NATSU COFFEE</span>
                                @break
                            @default
                                Hubungi Admin
                        @endswitch
                    </p>
                </div>

                <div class="border-t border-dashed pt-4">
                    <p class="text-sm text-neutral-500 mb-1">Total yang harus dibayar:</p>
                    <p class="text-3xl font-bold text-amber-700">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                    <p class="text-xs text-red-500 mt-1">*Mohon transfer sesuai nominal hingga 3 digit terakhir.</p>
                </div>

            </div>
        </div>

        <div class="mt-6 bg-neutral-50 p-4 rounded-lg text-center text-sm">
            Sudah melakukan pembayaran? 
            <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20sudah%20bayar%20invoice%20{{ $order->invoice_number }}" target="_blank" class="text-green-600 font-bold hover:underline">
                Konfirmasi via WhatsApp ➜
            </a>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-bold text-lg mb-4 border-b pb-2">Rincian Pesanan</h3>
        <ul class="space-y-4">
            @foreach($order->items as $item)
            <li class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <img src="{{ asset($item->product->image) }}" class="w-12 h-12 rounded object-cover bg-gray-100">
                    <div>
                        <p class="font-bold">{{ $item->product->name }}</p>
                        <p class="text-sm text-neutral-500">{{ $item->qty }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
                </div>
                <p class="font-bold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
            </li>
            @endforeach
        </ul>
        <div class="mt-6 pt-4 border-t flex justify-between font-bold text-lg">
            <span>Total</span>
            <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('dashboard') }}" class="text-neutral-500 hover:text-black">← Kembali ke Dashboard</a>
    </div>

</div>
@endsection