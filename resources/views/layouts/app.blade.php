<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Styles -->
        <script src="https://kit.fontawesome.com/8facb7467b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        @stack('styles')
    </head>
    <body class="bg-gray-100 text-gray-500 font-sans font-thin flex flex-col min-h-screen md:flex-row md:flex-row">
        @include('sweetalert::alert')

        <div class="relative w-full">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
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
