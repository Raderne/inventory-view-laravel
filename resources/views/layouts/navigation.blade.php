<nav class="py-4">
    <div class="flex flex-col items-center justify-between h-full">
        <!-- logo -->
        <div class="w-12 h-12 bg-white rounded-md p-2">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo" />
        </div>

        <!-- nav links -->
        <div class="flex flex-col items-center gap-y-5">
            <x-nav-link href="/" :active="request()->is('/')"
                title="Dashboard">
                bx bxs-dashboard
            </x-nav-link>

            <x-nav-link href="/suppliers" :active="request()->is('supplies')"
                title="Supplies">
                bx bxs-add-to-queue
            </x-nav-link>

            <x-nav-link href="/history" :active="request()->is('history')"
                title="History">
                bx bx-history
            </x-nav-link>

            <x-nav-link href="/staff" :active="request()->is('staff')"
                title="Staff">
                bx bx-group
            </x-nav-link>
        </div>

        <!-- logout -->
        <div class="">
            @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="text-2xl text-white" title="Logout">
                    <i class="bx bxs-log-out-circle"></i>
                </button>
            </form>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="text-2xl text-white" title="Login">
                <i class='bx bx-log-in text-xl'></i>
            </a>
            @endguest
        </div>
    </div>
</nav>