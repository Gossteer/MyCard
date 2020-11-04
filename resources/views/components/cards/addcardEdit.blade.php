<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="clickNext1()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea wire:model.lazy="text" maxlength="255" class="texForTexarea"></textarea>
    </div>
    <div class="articles__footer">
        <select wire:model="selectedTag" id="selectedTag" class="selectTag">
            @foreach ($selectTags as $selectTag)
                <option value="{{$selectTag->id}}">{{$selectTag->tag}}</option>
            @endforeach
        </select>
        <time title="{{$attributes['timeCreate']}}">{{$attributes['dateCreate']}}</time>
    </div>
</div>

