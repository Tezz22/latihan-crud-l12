<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'App')</title>

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="h-full text-white min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    @include('components.navbar')

    {{-- HEADER (opsional) --}}
    @hasSection('header')
        @yield('header')
    @endif

    {{-- MAIN: penting flex-1 biar footer turun --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('components.footer')

    {{-- GLOBAL COMPONENTS --}}
    @include('components.confirm-delete')
    @include('components.confirm-delete-script')

    {{-- SCRIPTS PER PAGE --}}
    @stack('scripts')

</body>
</html>