<div class="cardMinimal">
    <div class="card" style="--background:{{$backgroundbutton}}; --text:{{$textbutton}};">
        <x-dynamic-component :component="$component_edit_text" idCard={{$idCard}} wire:key="{{ $idCard }}"
        style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
        style2="--backgroundbutton:{{$backgroundbutton}}; --textbutton:{{$textbutton}};" :selectTagsforcard="$selectTagsforcard"
        backgroundscrollBar="--backgroundscrollBarHide:{{$backgroundscrollBar[0]}},{{$backgroundscrollBar[1]}},{{$backgroundscrollBar[2]}};--backgroundscrollBar:{{$textbutton}}"
        source="{{$cardselect->source}}" tag="{{$selectTagsforcard->find($cardselect->tag_id)->tag}}" data="{{date('d.m.y', strtotime($cardselect->created_at))}}" text="{{$cardselect->text}}"
        datatime="{{date('H:i:s', strtotime($cardselect->created_at))}}"/>
    </div>
</div>


