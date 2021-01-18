<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-search" wire:click="clickNext2()"></button>
    <button class="fas fa-align-left" wire:click="clickBack1()"></button>
    <button class="fas fa-times" wire:click="click_chow()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea wire:model.defer="cardadd.source" maxlength="255" style="{{$attributes['backgroundscrollBar']}}"  title=" @error('cardadd.source') {{$message}} @enderror " class="texForTexarea @error('cardadd.source') {{"error"}} @enderror "></textarea>
    </div>
</div>
