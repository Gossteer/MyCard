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
                    <li class="articles__article" style="--animation-order:1"><a href="http://htmlbook.ru/html/a" class="articles__link">
                        <div class="articles__content articles__content--lhs">
                          <h2 class="articles__title">Sweet roll gingerbread sweet roll jelly</h2>
                          <div class="articles__footer">
                            <p>Cakes</p>
                            <time>1 Jan 2020</time>
                          </div>
                        </div>
                        <div class="articles__content articles__content--rhs" aria-hidden="true">
                          <h2 class="articles__title">Sweet roll gingerbread sweet roll jelly</h2>
                          <div class="articles__footer">
                            <p>Cakes</p>
                            <time>1 Jan 2020</time>
                          </div>
                        </div></a></li>
                    <li class="articles__article" style="--animation-order:2"><a class="articles__link">
                        <div class="articles__content articles__content--lhs">
                          <h2 class="articles__title">Bar cupcake chocolate topping brownie</h2>
                          <div class="articles__footer">
                            <p>Chocolates</p>
                            <time>2 Feb 2020</time>
                          </div>
                        </div>
                        <div class="articles__content articles__content--rhs" aria-hidden="true">
                          <h2 class="articles__title">Bar cupcake chocolate topping brownie</h2>
                          <div class="articles__footer">
                            <p>Chocolates</p>
                            <time>2 Feb 2020</time>
                          </div>
                        </div></a></li>
                    <li class="articles__article" style="--animation-order:3"><a class="articles__link">
                        <div class="articles__content articles__content--lhs">
                          <h2 class="articles__title">Powder tootsie roll chocolate sugar</h2>
                          <div class="articles__footer">
                            <p>Puddings</p>
                            <time>3 Mar 2020</time>
                          </div>
                        </div>
                        <div class="articles__content articles__content--rhs" aria-hidden="true">
                          <h2 class="articles__title">Powder tootsie roll chocolate sugar</h2>
                          <div class="articles__footer">
                            <p>Puddings</p>
                            <time>3 Mar 2020</time>
                          </div>
                        </div></a></li>
                  </ol>
            </div>
        </div>
    </div>

 @push('style')
 <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
 @endpush
</x-app-layout>
