<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="click_preview()"></button>
    <button class="fas fa-heart" wire:click="click_edit()"></button>
    <button class="fas fa-heart" wire:click="removecards()"></button>
    <button class="fas fa-heart" wire:click="click_chow()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea wire:model.defer="source" maxlength="255" class="texForTexarea"></textarea>
    </div>
</div>
