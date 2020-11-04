<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="clickNext3"></button>
    <button class="fas fa-heart" wire:click="clickBack2"></button>
    <button class="fas fa-heart" wire:click="clickBack1"></button>
</div>
<div class="container"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 88%;">
        <div readonly class="texForTexareaShow" style="{{$attributes['backgroundscrollBar']}}">{{$attributes['texForTexarea']}}</div>
    </div>
    <div class="articles__footer">
        <p>{{$attributes['tag']}}</p>
        <time title="{{$attributes['timeCreate']}}">{{$attributes['dateCreate']}}</time>
    </div>
</div>






