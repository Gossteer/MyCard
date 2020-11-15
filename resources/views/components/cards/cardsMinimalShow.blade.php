<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="click_edit()"></button>
</div>
<a id="sourceCard" target="_blank" href="{{$attributes['source']}}">
    <div class="container"  style="{{$attributes['style1']}}">
        <div class="mainText" style=" height: 86%;">
            <div readonly class="texForTexareaShow" style="{{$attributes['backgroundscrollBar']}}">{{$attributes['text']}}</div>
        </div>
        <div class="articles__footer">
            <p>{{$attributes['tag']}}</p>
            <time title="{{$attributes['datatime']}}">{{$attributes['data']}}</time>
        </div>
    </div>
</a>



