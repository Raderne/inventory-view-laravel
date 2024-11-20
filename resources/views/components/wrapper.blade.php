@props(['header' => null])

<x-app-layout>

    <div class="flex items-center justify-between">
        @if ($header)
        <h1 class="text-4xl font-semibold font-hanken-grotesk text-gray-900 mb-3">{{ $header }}</h1>
        @endif

        <div class="flex items-center gap-x-2">
            @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <i class='bx bx-bell text-2xl px-2 py-1'></i>
                </x-slot>

                <x-slot name="content">
                    <div class="py-1 bg-white">
                        <span class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Notifications</span>
                        <span class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Messages</span>
                    </div>
                </x-slot>
            </x-dropdown>

            <x-dropdown>
                <x-slot name="trigger">
                    <div class="flex items-center space-x-2 px-4 py-2">
                        <i class='bx bx-user-circle text-2xl'></i>
                        <span class="font-hanken-grotesk font-semibold">
                            {{ auth()->user()->name }}
                        </span>
                        <i class='text-xl bx bx-chevron-down transition-transform duration-300 ease-in-out' x-bind:class="{ 'transform rotate-180': open }"></i>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <div class="py-1 bg-white">
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <!-- <div class="w-full"> -->
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                        <!-- </div> -->
                    </div>
                </x-slot>
            </x-dropdown>
            @endauth

            @guest
            <a href="/register" class="flex items-center px-4 py-1 gap-x-2 bg-light_blue rounded-full font-hanken-grotesk font-semibold">
                <i class='bx bxs-log-in text-xl'></i>
                <span>Register</span>
            </a>
            <a href="/login" class="flex items-center px-4 py-1 gap-x-2 bg-light_blue rounded-full font-hanken-grotesk font-semibold">
                <i class='bx bx-log-in text-xl'></i>
                <span>Login</span>
            </a>
            @endguest
        </div>
    </div>

    <div class="h-[90%] overflow-y-auto mt-3">
        {{ $slot }}
    </div>

</x-app-layout>