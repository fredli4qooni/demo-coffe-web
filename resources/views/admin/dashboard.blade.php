@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold mb-8 text-neutral-800">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white shadow-sm border border-neutral-200 rounded-xl p-6">
                <p class="text-sm text-neutral-500 mb-2 font-medium">Total Produk</p>
                <p class="text-4xl font-bold text-amber-700">{{ $product_count }}</p>
            </div>

            <div class="bg-white shadow-sm border border-neutral-200 rounded-xl p-6">
                <p class="text-sm text-neutral-500 mb-2 font-medium">Total Kategori</p>
                <p class="text-4xl font-bold text-amber-700">{{ $category_count }}</p>
            </div>

            <div class="bg-white shadow-sm border border-neutral-200 rounded-xl p-6">
                <p class="text-sm text-neutral-500 mb-2 font-medium">Pesanan Masuk</p>
                <p class="text-4xl font-bold text-amber-700">{{ $recent_orders->count() }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-neutral-200 overflow-hidden">
            <div class="p-6 border-b border-neutral-200 flex justify-between items-center">
                <h2 class="text-xl font-bold text-neutral-800">Pesanan Terbaru</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-neutral-50 text-neutral-600 uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-4">Invoice</th>
                            <th class="px-6 py-4">Customer</th>
                            <th class="px-6 py-4">Total</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        @forelse($recent_orders as $order)
                            <tr class="hover:bg-neutral-50 transition">
                                <td class="px-6 py-4 font-mono font-medium text-amber-700">
                                    #{{ $order->invoice_number }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-neutral-800">{{ $order->customer_name }}</div>
                                    <div class="text-xs text-neutral-500">{{ $order->customer_phone }}</div>
                                </td>
                                <td class="px-6 py-4 font-bold">
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($order->status == 'pending')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">Pending</span>
                                    @else
                                        <span
                                            class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-neutral-500">
                                    {{ $order->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="text-blue-600 hover:underline font-medium">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-neutral-500">
                                    Belum ada pesanan masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
