<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Библиотека') }}
        </h2>
    </x-slot>

    @livewire('main-home', ['allstyles' => $allstyles, 'selectTags' => $selectTags])



    @push('style')
        <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
        <script src="{{ asset('js/card.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer ></script>
    @endpush


</x-app-layout>

