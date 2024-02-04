<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* CSS for printing */
            @media print {
                /* Hide page header and footer */
                @page {
                    size: auto; /* auto is the default value */
                    margin: 0; /* zero out the page margins */
                }

                body {
                    margin: 30px; /* zero out the body margins */
                }
            }
        </style>


        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <div class="flex Layout pt-[80px]">
                <x-sidebar />

                <div class="flex-1 w-4/5">
                    <div class="p-4">
                        <!-- Page Content -->
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewire('livewire-ui-modal')
        @livewireScripts
    </body>
</html>
