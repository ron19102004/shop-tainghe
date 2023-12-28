<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>@yield('title')</title>
</head>

<body class="overflow-x-hidden">
    @include('components.header-admin')
    <main class="p-3">
        @yield('main')
    </main>
    @include('components.footer-admin')
</body>

</html>
