@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-2">Dashboard Saya</h1>
    <p class="text-neutral-500 mb-8">Selamat datang, {{ Auth::user()->name }}!</p>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold">Riwayat Pesanan</h2>
        </div>

        @if($orders->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-neutral-100 text-neutral-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">No. Invoice</th>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Total</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Detail Item</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($orders as $order)
                        <tr class="hover:bg-neutral-50">
                            <td class="px-6 py-4 font-mono font-bold text-amber-700">
                                #{{ $order->invoice_number }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                {{ $order->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 font-bold">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                @if($order->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full font-bold">Pending</span>
                                @elseif($order->status == 'paid')
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-bold">Dibayar</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-bold">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-neutral-500">
                                <ul class="list-disc pl-4">
                                    @foreach($order->items as $item)
                                        <li>{{ $item->product->name ?? 'Produk dihapus' }} (x{{ $item->qty }})</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-10 text-center">
                <p class="text-neutral-500 mb-4">Kamu belum pernah memesan kopi.</p>
                <a href="{{ route('menu.index') }}" class="inline-block bg-amber-600 text-white px-6 py-2 rounded-full hover:bg-amber-700 transition">
                    Pesan Sekarang
                </a>
            </div>
        @endif
    </div>
</div>
@endsection