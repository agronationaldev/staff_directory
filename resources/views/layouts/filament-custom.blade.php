<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Filament CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/filament/css/filament.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        body {
            background-color: white;
            color: black;
        }
    </style>
    @livewireStyles
</head>
<body class="filament-body">
    <div class="min-h-screen flex flex-col">
        <!-- Top Panel -->
        <header class="bg-white shadow">
            <div class="max-w-9xl mx-auto py-3 px-4 sm:px-6 h-16 lg:px-8 flex items-center">
                <img src="{{ asset('images/agrologo.png') }}" alt="Logo" class="h-20 w-20 mr-3"> <!-- Adjust the path and size as needed -->
                <h1 class="text-3xl font-bold text-gray-900">
                    {{ config('app.name', 'Laravel') }}
                </h1>
            </div>
        </header>
        <main class="flex-1">
            @yield('content')
        </main>
    </div>
    <!-- Filament JS -->
    <script src="{{ asset('vendor/filament/js/filament.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
    @livewireScripts
</body>
</html>
