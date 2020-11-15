<div class="cardMinimal">
    <div class="card" style="--background:{{$backgroundbutton}}; --text:{{$textbutton}};">
        <x-dynamic-component :component="$component_edit_text" idCard={{$idCard}}
        style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
        style2="--backgroundbutton:{{$backgroundbutton}}; --textbutton:{{$textbutton}};" :selectTagsforcard="$selectTagsforcard" :selectedTagforcard="$selectedTagforcard"
        backgroundscrollBar="--backgroundscrollBarHide:{{$backgroundscrollBar[0]}},{{$backgroundscrollBar[1]}},{{$backgroundscrollBar[2]}};--backgroundscrollBar:{{$textbutton}}"
        source="{{$source}}" tag="{{$selectTagsforcard->find($selectedTagforcard)->tag}}" data="{{$data}}" text="{{$text}}" datatime="{{$datatime}}"/>
    </div>
</div>


