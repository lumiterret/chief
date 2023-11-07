<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name', 'Laravel') }}@yield('title')</title>
</head>
<body class="d-flex flex-column h-100">
@include('layouts.partials.header')
@if (session('success'))
    <div class="container alert alert-success text-center">
        {{ session('success') }}
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('danger'))
    <div class="container alert alert-danger text-center">
        {{ session('danger') }}
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <main>
        @yield('content')
    </main>
@include('layouts.partials.footer')
{{--<script>
    window.onload = function() {
        if (window.$) {
            // jQuery is loaded
            console.log("Yeah!");
        } else {
            // jQuery is not loaded
            console.log("Doesn't Work");
        }
    };
</script>--}}
</body>
</html>
