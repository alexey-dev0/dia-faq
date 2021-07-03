<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#b91d47">
        <meta name="theme-color" content="#ffffff">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


        <!-- Styles -->
        <script src="https://kit.fontawesome.com/8facb7467b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        @stack('styles')
    </head>
    <body class="bg-gray-100 text-gray-500 font-sans font-thin flex flex-col min-h-screen md:flex-row md:flex-row">
        @include('sweetalert::alert')

        <div class="flex flex-col relative w-full">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="flex-1">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>

        <!-- Scripts -->
        @livewireScripts
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="{{ mix('js/app.js') }}"></script>
        @livewire('livewire-ui-modal')
        @livewireUIScripts
        @stack('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if ( location.hash.substring(1) === 'auth' ) {
                    Livewire.emit('openModal', 'auth.modal');
                    history.pushState("", document.title, location.pathname + location.search);
                }
            });
        </script>
    </body>
</html>
