<div class="cardMinimal">
    <div class="card" style="--background:{{$backgroundbutton}}; --text:{{$textbutton}};">
        <x-dynamic-component :component="$component_edit_text" click="{{$click}}"
        style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
        style2="--backgroundbutton:{{$backgroundbutton}}; --textbutton:{{$textbutton}};"
        backgroundscrollBar="--backgroundscrollBarHide:{{$backgroundscrollBar[0]}},{{$backgroundscrollBar[1]}},{{$backgroundscrollBar[2]}};--backgroundscrollBar:{{$textbutton}}"
        source="{{$source}}" tag="{{$tag}}" data="{{$data}}" text="{{$text}}" textforEdit="{{$textforEdit}}"/>
    </div>
</div>


