@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Checkout Pesanan</h1>

    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Ups! Ada kesalahan input:</strong>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Gagal:</strong> {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        
        <div class="bg-white p-6 rounded-xl shadow-lg h-fit">
            <h2 class="text-xl font-bold mb-4 border-b pb-2">Informasi Pembeli</h2>
            
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="customer_name" 
                           value="{{ Auth::check() ? Auth::user()->name : '' }}" 
                           class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email (Opsional)</label>
                    <input type="email" name="customer_email" 
                           value="{{ Auth::check() ? Auth::user()->email : '' }}"
                           class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                    <input type="text" name="customer_phone" placeholder="08..."
                           class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500" required>
                </div>

                <h2 class="text-xl font-bold mb-4 border-b pb-2 mt-8">Metode Pembayaran</h2>
                
                <div class="space-y-3 mb-8">
                    
                    <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-neutral-50 hover:border-amber-500 transition">
                        <input type="radio" name="payment_method" value="qris" class="h-5 w-5 text-amber-600 focus:ring-amber-500" required>
                        <div class="ml-3">
                            <span class="block font-bold text-neutral-800">QRIS (Scan Barcode)</span>
                            <span class="block text-sm text-neutral-500">Gopay, OVO, Dana, ShopeePay, Mobile Banking</span>
                        </div>
                    </label>

                    <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-neutral-50 hover:border-amber-500 transition">
                        <input type="radio" name="payment_method" value="bank_bca" class="h-5 w-5 text-amber-600 focus:ring-amber-500">
                        <div class="ml-3">
                            <span class="block font-bold text-neutral-800">Bank BCA</span>
                            <span class="block text-sm text-neutral-500">Transfer Manual (Cek Otomatis)</span>
                        </div>
                    </label>

                    <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-neutral-50 hover:border-amber-500 transition">
                        <input type="radio" name="payment_method" value="bank_bri" class="h-5 w-5 text-amber-600 focus:ring-amber-500">
                        <div class="ml-3">
                            <span class="block font-bold text-neutral-800">Bank BRI</span>
                            <span class="block text-sm text-neutral-500">Transfer Manual</span>
                        </div>
                    </label>

                    <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-neutral-50 hover:border-amber-500 transition">
                        <input type="radio" name="payment_method" value="bank_mandiri" class="h-5 w-5 text-amber-600 focus:ring-amber-500">
                        <div class="ml-3">
                            <span class="block font-bold text-neutral-800">Bank Mandiri</span>
                            <span class="block text-sm text-neutral-500">Transfer Manual</span>
                        </div>
                    </label>

                </div>

                <button type="submit" class="w-full bg-black text-white py-4 rounded-full font-bold text-lg hover:bg-amber-800 transition shadow-lg">
                    Buat Pesanan
                </button>
            </form>
        </div>

        <div class="bg-gray-50 p-6 rounded-xl border h-fit">
            <h2 class="text-xl font-bold mb-4 border-b pb-2">Ringkasan Order</h2>
            
            <ul class="space-y-4 mb-6">
                @foreach($cart as $item)
                    <li class="flex justify-between items-center text-sm">
                        <div class="flex items-center gap-3">
                            <span class="font-bold text-gray-500">{{ $item['quantity'] }}x</span>
                            <span>{{ $item['name'] }}</span>
                        </div>
                        <span class="font-medium">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="border-t pt-4 flex justify-between items-center text-xl font-bold">
                <span>Total Bayar</span>
                <span class="text-amber-700">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
        </div>

    </div>
</div>
@endsection