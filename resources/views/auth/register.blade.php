@extends('layouts.guest')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-neutral-100">

    <div class="bg-white shadow-xl p-8 rounded-2xl w-full max-w-md border">

        <h1 class="text-center text-3xl font-bold text-amber-700 mb-2">
            NatsuCaffe
        </h1>
        <p class="text-center text-neutral-600 mb-6">Buat Akun Baru</p>

        <!-- FORM REGISTER -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Nama Lengkap</label>
                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-amber-600"
                    required autofocus
                />
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-amber-600"
                    required
                />
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-amber-600"
                    required
                />
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-amber-600"
                    required
                />
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-amber-700 hover:bg-amber-800 transition text-white py-2 rounded-lg font-semibold">
                Daftar
            </button>

            {{-- Login link --}}
            <div class="mt-4 text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-amber-700 font-semibold">Login</a>
            </div>

        </form>

    </div>

</div>
@endsection
