<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'NatsuCaffe' }}</title>

    <!-- Load Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-100 font-sans">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- PAGE HEADER KHUSUS JIKA ADA --}}
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- PAGE CONTENT --}}
    <main class="pt-24 max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="text-center text-neutral-500 text-sm mt-20 py-6">
        © {{ date('Y') }} NatsuCaffe • Bandar Lampung
    </footer>

</body>
</html>
