    <li class="articles__article" style="--animation-order:1">
        <a onclick="{{$cardsAttributes['onclick']}}" target="_blank" ondblclick="" wire:dblclick="{{$cardsAttributes['dblclick']}}" class="{{$cardsAttributes['articles__link']}}">
            <x-dynamic-component :component="$cardsAttributes['component_edit_text']" styleLefttText="{{$cardsAttributes['styleLefttText']}}" styleRightText="{{$cardsAttributes['styleRightText']}}"  text="{{$cardsAttributes['text']}}"/>
        </a>
    </li>



