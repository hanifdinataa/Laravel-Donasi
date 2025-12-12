<div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white shadow-lg py-2 z-50">
    <div class="flex justify-around text-center text-gray-700 text-xs">

        <!-- Home -->
        <a href="/" class="flex flex-col items-center">
            <span class="text-lg">🏠</span>
            <span>Beranda</span>
        </a>

        <!-- Tentang -->
        <a href="/tentang" class="flex flex-col items-center">
            <span class="text-lg">👥</span>
            <span>Tentang</span>
        </a>

        <!-- Kontak -->
        <a href="/kontak" class="flex flex-col items-center">
            <span class="text-lg">📞</span>
            <span>Kontak</span>
        </a>

        <!-- Login -->
        {{-- @guest
            <a href="{{ route('login') }}" class="flex flex-col items-center">
                <span class="text-lg">🔐</span>
                <span>Login</span>
            </a>
        @else
            <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center">
                <span class="text-lg">🛠️</span>
                <span>Admin</span>
            </a>
        @endguest --}}

    </div>
</div>
