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

            <a href="{{ route('cart.index') }}" class="relative group">
                <svg class="w-6 h-6 text-neutral-700 group-hover:text-amber-700 transition" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 100 6 3 3 0 000-6zm10.5
                        0a3 3 0 100 6 3 3 0 000-6zM3 6.75h17.25"/>
                </svg>
                
                <span class="absolute -top-2 -right-2 bg-amber-700 text-white text-xs px-1.5 py-0.5 rounded-full">
                    {{ count((array) session('cart')) }}
                </span>
            </a>

            @guest
                <a href="{{ route('login') }}" class="text-neutral-700 hover:text-amber-700 font-medium">Login</a>
            @else
                <div class="flex items-center gap-4">
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" 
                       class="text-neutral-700 hover:text-amber-700 font-bold">
                        Hi, {{ Auth::user()->name }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs bg-red-50 text-red-600 border border-red-200 px-3 py-1.5 rounded-full hover:bg-red-600 hover:text-white transition">
                            Logout
                        </button>
                    </form>
                </div>
            @endguest

        </div>

    </div>
</nav>