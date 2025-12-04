<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'NatsuCaffe' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-100">

    {{-- NAVBAR USER --}}
    @include('layouts.navbar')

    <main class="pt-24 max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

    <footer class="text-center text-neutral-500 text-sm mt-20 py-6">
        © {{ date('Y') }} NatsuCaffe • Bandar Lampung
    </footer>

</body>
</html>
