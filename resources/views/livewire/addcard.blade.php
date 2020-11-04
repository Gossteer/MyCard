<div class="cardMinimal">
    <div class="card" style="--background:{{$backgroundMain}}; --text:{{$textbuttonMain}};" >
        <x-dynamic-component :component="$component_edit_text" click="{{$click}}"
        style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
        style2="--backgroundbutton:{{$backgroundbutton}}; --textbutton:{{$textbutton}};"
        source="{{$source}}" tag="{{$tag}}" texForTexarea="{{$texForTexarea}}" :selectTags="$selectTags"
        timeCreate="{{$timeCreate}}" dateCreate="{{$dateCreate}}" :selectedTag="$selectedTag" tag="{{$tag}}"
        source="{{$source}}"/>
    </div>
</div>


