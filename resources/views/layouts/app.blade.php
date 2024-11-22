<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@400;500;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black overflow-hidden">
    <div class="flex min-h-screen h-full py-4 pr-2">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="flex-1 bg-white rounded-3xl p-6 pl-12 overflow-hidden max-h-[96vh]">
            {{ $slot }}
        </main>
    </div>
</body>

</html>