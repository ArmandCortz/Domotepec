<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ env('APP_NAME') }} </title>
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <!-- CSS-->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('footer')

</body>

</html>
