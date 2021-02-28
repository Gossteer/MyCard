<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Библиотека') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="cardMinimal">
                @foreach ($cardscontainers as $key => $cardscontainer)
                    @livewire('category-cards', ['allstyles' => &$allstyles, 'selectTags' => &$selectTags, 'cards' => $cardscontainer, 'keytag' => $key+1 ], key($key+1))
                @endforeach
            </div>
        </div>
    </div>


    @push('style')
        <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
        <script src="{{ asset('js/card.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer ></script>
    @endpush


</x-app-layout>

