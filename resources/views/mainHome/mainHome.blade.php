<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Библиотека') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" ">
                <ol class="articles">
                    <livewire:cards>
                </ol>
            </div>
        </div>
    </div>

    @push('style')
 <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
 @endpush
</x-app-layout>
