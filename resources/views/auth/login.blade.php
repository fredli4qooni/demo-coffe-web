@extends('layouts.guest')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-neutral-100">

    <div class="bg-white shadow-xl p-8 rounded-2xl w-full max-w-md border">

        <h1 class="text-center text-3xl font-bold text-amber-700 mb-2">
            NatsuCaffe
        </h1>
        <p class="text-center text-neutral-600 mb-6">Login ke Akun Anda</p>

        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-amber-600"
                    required autofocus
                />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-amber-600"
                    required
                />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-sm text-gray-700">Remember me</span>
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-amber-700 hover:bg-amber-800 transition text-white py-2 rounded-lg font-semibold">
                Login
            </button>

            <div class="mt-4 text-center">
                <a href="{{ route('password.request') }}" class="text-sm text-amber-700">Lupa password?</a>
            </div>

            <div class="mt-2 text-center text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-amber-700 font-semibold">Daftar</a>
            </div>

        </form>

    </div>

</div>
@endsection
