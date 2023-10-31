<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary flex-column min-vh-100">
<main>
    @yield('main')
</main>
@vite(['resources/js/app.js'])
</body>
</html>
