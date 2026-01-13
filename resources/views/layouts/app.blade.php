<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'App')</title>

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="h-full text-white">

<div class="min-h-full">
    {{-- NAVBAR --}}
    @include('components.navbar')

    {{-- HEADER (opsional) --}}
    @hasSection('header')
        @yield('header')
    @endif

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>
</div>

{{-- SCRIPTS PER PAGE --}}
@stack('scripts')
@include('components.confirm-delete')
@include('components.confirm-delete-script')
</body>
</html>