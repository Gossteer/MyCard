<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="clickNext2()"></button>
    <button class="fas fa-heart" wire:click="clickBack1"></button>
    <button class="fas fa-heart" wire:click="click_chow()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea wire:model.defer="source" maxlength="255" style="{{$attributes['backgroundscrollBar']}}"  title=" @error('source') {{$message}} @enderror " class="texForTexarea @error('source') {{"error"}} @enderror "></textarea>
    </div>
</div>
