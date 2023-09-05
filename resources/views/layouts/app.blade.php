<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    
    @include('layouts.components.head')
    
</head>

<body class="antialiased">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    @push('scripts')
        @include('layouts.components.scripts')

    </body>

    </html>
