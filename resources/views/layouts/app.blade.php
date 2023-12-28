<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>@yield('title')</title>
</head>

<body>
    @include('components.header')
    <main class="p-3">
        @yield('main')
    </main>
    @include('components.footer')
</body>

</html>
