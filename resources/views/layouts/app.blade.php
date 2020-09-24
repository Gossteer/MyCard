<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <div class="row mt-5">
                <div class="col-md-6 col-xl-4">
                  <x-card class="mb-3">
                    <x-slot name="header">
                      <x-headline class="h6 mb-0">
                        <x-link class="text-body" text="Card Header Headline" href="#"/>
                      </x-headline>
                    </x-slot>

                    <x-slot name="image">
                      <x-image src="https://via.placeholder.com/253x169" :width="[253]" :height="[169]"/>
                    </x-slot>

                    <x-slot name="body">
                      <x-headline class="h5">
                        <x-link text="Card Body Headline" href="#"/>
                      </x-headline>
                    </x-slot>

                    <x-slot name="footer">
                      card Footer Text
                    </x-slot>
                  </x-card>
                </div>

                <div class="col-md-6 col-xl-4">
                  <x-card :all="$card" class="mb-3" :image="['width' => [253], 'height' => [169]]" :footer="['hide' => true]"/>
                </div>
                <div class="col-md-6 col-xl-4">
                  <x-card :all="$card" class="mb-3" :image="['width' => [253], 'height' => [169]]" :header="['hide' => true]"/>
                </div>
              </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
