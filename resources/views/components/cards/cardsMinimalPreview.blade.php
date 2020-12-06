<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="click_edit_cource()"></button>
    <button class="fas fa-heart" wire:click="click_edit()"></button>
    <button class="fas fa-heart" wire:click="removecards()"></button>
    <button class="fas fa-heart" wire:click="click_chow()"></button>
</div>
<a wire:click='leftchengcolor()' style="cursor: pointer;">
    <div class="container articles__link"  style="{{$attributes['style1']}}">
        <div class="mainText" style=" height: 84%;">
            <div class="articles__link link_left"></div>
            <div readonly class="texForTexareaShow" style="overflow: hidden;{{$attributes['backgroundscrollBar']}}">{{$attributes['text']}}</div>
        </div>
        <div class="articles__footer">
            <p>{{$attributes['tag']}}</p>
            <time></time>
        </div>
    </div>
</a>
<a wire:click='rightchengcolor()' style="cursor: pointer;">
    <div class="container articles__link_edit"  style="{{$attributes['style1']}}">
        <div class="mainText" style=" height: 84%;">
            <div class="articles__link link_right"></div>
            <div readonly class="texForTexareaShow" style="overflow: hidden;{{$attributes['backgroundscrollBar']}}">{{$attributes['text']}}</div>
        </div>
        <div class="articles__footer">
            <p></p>
            <time title="{{$attributes['datatime']}}">{{$attributes['data']}}</time>
        </div>
    </div>
</a>









