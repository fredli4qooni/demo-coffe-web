@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    
    {{-- Header & Tombol Kembali --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Detail Pesanan: #{{ $order->invoice_number }}</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-neutral-600 hover:text-black">← Kembali ke Dashboard</a>
    </div>

    {{-- Notifikasi Sukses Update --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- KOLOM KIRI: Daftar Barang --}}
        <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-bold mb-4 border-b pb-2">Item Pesanan</h2>
            <table class="w-full text-left">
                <thead>
                    <tr class="text-neutral-500 text-sm">
                        <th class="pb-2">Produk</th>
                        <th class="pb-2">Harga</th>
                        <th class="pb-2">Qty</th>
                        <th class="pb-2 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($order->items as $item)
                    <tr>
                        <td class="py-4 flex items-center gap-3">
                            <img src="{{ asset($item->product->image) }}" class="w-12 h-12 rounded object-cover">
                            <span>{{ $item->product->name }}</span>
                        </td>
                        <td class="py-4">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="py-4">x{{ $item->qty }}</td>
                        <td class="py-4 text-right font-bold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="border-t">
                    <tr>
                        <td colspan="3" class="pt-4 text-right font-bold text-lg">Total Amount</td>
                        <td class="pt-4 text-right font-bold text-xl text-amber-700">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        {{-- KOLOM KANAN: Info Customer & Aksi --}}
        <div class="space-y-6">
            
            {{-- Info Customer --}}
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="font-bold text-lg mb-4">Informasi Pelanggan</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="text-neutral-500 block">Nama</span>
                        <span class="font-medium">{{ $order->customer_name }}</span>
                    </div>
                    <div>
                        <span class="text-neutral-500 block">WhatsApp</span>
                        <span class="font-medium">{{ $order->customer_phone }}</span>
                    </div>
                    <div>
                        <span class="text-neutral-500 block">Email</span>
                        <span class="font-medium">{{ $order->customer_email ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-neutral-500 block">Waktu Order</span>
                        <span class="font-medium">{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>

            {{-- UPDATE STATUS FORM --}}
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-amber-500">
                <h3 class="font-bold text-lg mb-4">Update Status</h3>
                
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <label class="block text-sm text-neutral-500 mb-2">Status Saat Ini</label>
                    <select name="status" class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500 mb-4">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending (Menunggu Bayar)</option>
                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid (Sudah Dibayar)</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed (Selesai/Diambil)</option>
                        <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Failed (Batal)</option>
                    </select>

                    <button type="submit" class="w-full bg-black text-white py-2 rounded-lg font-bold hover:bg-gray-800 transition">
                        Simpan Perubahan
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection