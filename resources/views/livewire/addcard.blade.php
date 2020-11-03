<div class="cardMinimal">
    <div class="card" style="--background:{{$backgroundbutton}}; --text:{{$textbutton}};" >
        <x-dynamic-component :component="$component_edit_text" click="{{$click}}"
        {{-- clickNext1="{{}}" clickNext2="{{}}" clickNext3="{{}}" --}}
        style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
        style2="--backgroundbutton:{{$backgroundbutton}}; --textbutton:{{$textbutton}};"
        source="{{$source}}" tag="{{$tag}}" texForTexarea="{{$texForTexarea}}" />
    </div>
</div>


