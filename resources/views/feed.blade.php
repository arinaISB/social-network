 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header-component :feed-url="{{ json_encode(route('feed')) }}" :logout-url="{{ json_encode(route('logout')) }}" :main-page-url="{{ json_encode(route('main.page')) }}"></header-component>
        <feed-component :posts="{{ json_encode($posts) }}"></feed-component>
    </div>
</body>
</html>

<style>
    html, body {
        background-color: #1f253d !important;
        margin: 0;
        padding: 0;
    }
</style>
