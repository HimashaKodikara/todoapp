<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

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
    <link href={{ asset('assets\css\bootstrap.min.css') }} rel="stylesheet">
    @yield('style')
</head>

<body class="d-flex flex-column h-100 m-5">
    @include('layouts.navigation')
    @yield('content')


    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Sticky footer with fixed navbar</h1>
            <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and
                CSS. A fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code
                    class="small">main &gt; .container</code>.</p>
            <p>Back to <a href="/docs/5.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
        </div>
    </main>
    @include('layouts.footer')

</body>

</html>
