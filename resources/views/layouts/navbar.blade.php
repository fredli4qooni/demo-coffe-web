<nav class="fixed w-full z-20 backdrop-blur bg-white/70 shadow-sm">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">

        <a href="{{ route('home') }}" class="text-xl font-bold tracking-wide text-amber-800">
            NatsuCaffe
        </a>

        <div class="space-x-6 flex items-center">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-amber-700 font-semibold' : 'text-neutral-700' }}">
                Beranda
            </a>

            <a href="{{ route('menu.index') }}" class="{{ request()->routeIs('menu.index') ? 'text-amber-700 font-semibold' : 'text-neutral-700' }}">
                Menu
            </a>

            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-amber-700 font-semibold' : 'text-neutral-700' }}">
                About
            </a>

            {{-- Cart --}}
            <a href="#" class="relative">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 100 6 3 3 0 000-6zm10.5
                        0a3 3 0 100 6 3 3 0 000-6zM3 6.75h17.25"/>
                </svg>
                <span class="absolute -top-2 -right-2 bg-amber-700 text-white text-xs px-1.5 py-0.5 rounded-full">0</span>
            </a>

            {{-- Login / Profile --}}
            @guest
                <a href="{{ route('login') }}" class="text-neutral-700 hover:text-amber-700 font-medium">Login</a>
            @else
                <a href="{{ route('dashboard') }}" class="text-neutral-700 hover:text-amber-700 font-medium">
                    {{ Auth::user()->name }}
                </a>
            @endguest

        </div>

    </div>
</nav>
