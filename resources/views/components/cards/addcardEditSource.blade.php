<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="clickNext2()"></button>
    <button class="fas fa-heart" wire:click="clickBack1"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <div class="mainText" style=" height: 94%;" >
            <textarea wire:model.lazy="source" maxlength="255" class="texForTexarea">{{$attributes['source']}}</textarea>
        </div>
    </div>
</div>
