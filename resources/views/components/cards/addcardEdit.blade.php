<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="clickNext1()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea wire:model="text" maxlength="255" class="texForTexarea">{{$attributes['texForTexarea']}}</textarea>
    </div>
</div>
