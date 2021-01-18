<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-search" wire:click="click_preview()"></button>
    <button class="fas fa-align-left" wire:click="click_edit()"></button>
    <button class="fas fa-trash-alt" wire:click="removecards()"></button>
    <button class="fas fa-times" wire:click="click_chow()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText " style=" height: 94%;" >
        <textarea wire:model.defer="cardselect.source" maxlength="255" title=" @error('cardselect.source') {{$message}} @enderror " class="texForTexarea @error('cardselect.source') {{"error"}} @enderror "></textarea>
    </div>
</div>
