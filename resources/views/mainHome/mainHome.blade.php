<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Библиотека') }}
        </h2>
    </x-slot>

    @livewire('main-home')
    <div class="visible-scrollbar">
        Etiam sagittis sem sed lacus laoreet, eu fermentum eros auctor.
        Proin at nulla elementum, consectetur ex eget, commodo ante.
        Sed eros mi, bibendum ut dignissim et, maximus eget nibh. Phasellus
        blandit quam turpis, at mollis velit pretium ut. Nunc consequat
        efficitur ultrices. Nullam hendrerit posuere est. Nulla libero
        sapien, egestas ac felis porta, cursus ultricies quam. Vestibulum
        tincidunt accumsan sapien, a fringilla dui semper in. Vivamus
        consectetur ipsum a ornare blandit. Aenean tempus at lorem sit
        amet faucibus. Curabitur nibh justo, faucibus sed velit cursus,
        mattis cursus dolor. Pellentesque id pretium est. Quisque
        convallis nisi a diam malesuada mollis. Aliquam at enim ligula.
      </div>

      <div class="invisible-scrollbar">
        Etiam sagittis sem sed lacus laoreet, eu fermentum eros auctor.
        Proin at nulla elementum, consectetur ex eget, commodo ante.
        Sed eros mi, bibendum ut dignissim et, maximus eget nibh. Phasellus
        blandit quam turpis, at mollis velit pretium ut. Nunc consequat
        efficitur ultrices. Nullam hendrerit posuere est. Nulla libero
        sapien, egestas ac felis porta, cursus ultricies quam. Vestibulum
        tincidunt accumsan sapien, a fringilla dui semper in. Vivamus
        consectetur ipsum a ornare blandit. Aenean tempus at lorem sit
        amet faucibus. Curabitur nibh justo, faucibus sed velit cursus,
        mattis cursus dolor. Pellentesque id pretium est. Quisque
        convallis nisi a diam malesuada mollis. Aliquam at enim ligula.
        </div>

        <div class="mostly-customized-scrollbar">
            Etiam sagittis sem sed lacus laoreet, eu fermentum eros auctor.
            Proin at nulla elementum, consectetur ex eget, commodo ante.
            Sed eros mi, bibendum ut dignissim et, maximus eget nibh. Phasellus
            blandit quam turpis, at mollis velit pretium ut. Nunc consequat
            efficitur ultrices. Nullam hendrerit posuere est. Nulla libero
            sapien, egestas ac felis porta, cursus ultricies quam. Vestibulum
            tincidunt accumsan sapien, a fringilla dui semper in. Vivamus
            consectetur ipsum a ornare blandit. Aenean tempus at lorem sit
            amet faucibus. Curabitur nibh justo, faucibus sed velit cursus,
            mattis cursus dolor. Pellentesque id pretium est. Quisque
            convallis nisi a diam malesuada mollis. Aliquam at enim ligula.<br>
        And pretty tall<br>
        thing with weird scrollbars.<br>
        Who thought scrollbars could be made weeeeird?
        </div>

    @push('style')
        <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    @endpush
</x-app-layout>
