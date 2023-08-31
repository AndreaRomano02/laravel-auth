<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.layout.head')
</head>

<body>
    <div id="app">

        {{-- # Navbar --}}
        @include('includes.layout.navbar')

        {{-- # Main Content --}}
        <main class="container my-5">
            @yield('content')
        </main>
    </div>
</body>

@yield('scripts')

</html>
