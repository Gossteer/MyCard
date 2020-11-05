<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="{{$attributes['click']}}"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea class="texForTexarea" maxlength="255" wire:model.defer="text" style="{{$attributes['backgroundscrollBar']}}">{{$attributes['textforEdit']}}</textarea>
    </div>
</div>




