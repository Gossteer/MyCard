<div class="multi-button"  style="{{$attributes['style']}}">
    <button class="fas fa-heart" wire:click="{{$attributes['click']}}"></button>
</div>
<a href="{{$attributes['source']}}">
    <div class="container">
        <div class="mainText">
            <h2 class="">{{$attributes['text']}}</h2>
        </div>
        <div class="articles__footer">
            <p>{{$attributes['tag']}}</p>
            <time>{{$attributes['data']}}</time>
        </div>
    </div>
</a>




