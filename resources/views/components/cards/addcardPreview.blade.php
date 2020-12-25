<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="clickNext3()"></button>
    <button class="fas fa-heart" wire:click="clickBack2()"></button>
    <button class="fas fa-heart" wire:click="clickBack1()"></button>
    <button class="fas fa-heart" wire:click="click_chow()"></button>
</div>
<a wire:click='leftchengcolor()' id='leftchengcolor' style="cursor: pointer;">
    <div class="container articles__link"  style="{{$attributes['style1']}}">
        <div class="mainText" style=" height: 84%;">
            <div class="articles__link link_left"></div>
            <div readonly class="texForTexareaShow" style="overflow: hidden;{{$attributes['backgroundscrollBar']}}">{{$attributes['text']}}</div>
        </div>
        <div class="articles__footer">
            <p>{{$attributes['tag']}}</p>
            <time ></time>
        </div>
    </div>
</a>
<a wire:click='rightchengcolor()' id='rightchengcolor' style="cursor: pointer;">
    <div class="container articles__link_edit"  style="{{$attributes['style1']}}">
        <div class="mainText" style=" height: 84%;">
            <div class="articles__link link_right"></div>
            <div readonly class="texForTexareaShow" style="overflow: hidden;{{$attributes['backgroundscrollBar']}}">{{$attributes['text']}}</div>
        </div>
        <div class="articles__footer">
            <p></p>
            <time title="{{$attributes['timeCreate']}}">{{$attributes['dateCreate']}}</time>
        </div>
    </div>
</a>
{{--
<x-jet-dialog-modal wire:model="checkmaxCards">
    <x-slot name="title">
        Ваш лимит карточек превышен
    </x-slot>

    <x-slot name="content">
        Пожалуйста удалите ненужные карточки или преобретите <a href="" style="font-weight: bold">подписку</a>
    </x-slot>

    <x-slot name="footer">
        <x-jet-button class="ml-2" x-on:click="show = false" wire:loading.attr="disabled">
            Ок
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal> --}}








