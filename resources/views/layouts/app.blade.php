<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
    <!-- Boczne menu nawigacyjne -->
    <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-white mb-6">Nawigacja</h2>
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg text-gray-200 hover:bg-blue-500 hover:text-white font-medium transition ease-in-out duration-150
                    {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('clients.index') }}" class="block px-4 py-2 rounded-lg text-gray-200 hover:bg-blue-500 hover:text-white font-medium transition ease-in-out duration-150
                    {{ request()->routeIs('clients.index') ? 'bg-blue-600 text-white' : '' }}">
                    Klienci
                </a>
                <!-- Możesz dodać więcej linków tutaj -->
            </nav>
        </div>
    </aside>

    <!-- Główna zawartość strony -->
    <div class="flex-1">
        <!-- Górne menu nawigacyjne -->
        @include('layouts.navigation')

        <!-- Nagłówek strony -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Główna zawartość strony -->
        <main class="py-8 px-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>
</body>
</html>
