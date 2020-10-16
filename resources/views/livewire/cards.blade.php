<div class="cardMinimal">
    <div class="card" style="--background:#3C3B3D; --text:white;">
        <x-dynamic-component :component="$cardsAttributes['component_edit_text']" click="{{$cardsAttributes['click']}}"
        style="--backgroundbutton:{{$cardsAttributes['backgroundbutton']}}; --textbutton:{{$cardsAttributes['textbutton']}};"
        source="{{$cardsAttributes['source']}}" class="{{$cardsAttributes['style']}}" tag="{{$cardsAttributes['tag']}}"
        data="{{$cardsAttributes['data']}}"   text="{{$cardsAttributes['text']}}"/>
    </div>
</div>
{{-- <div class="cardMinimal">
    <div class="card" style="--background:#3C3B3D; --text:white;">
        <div class="multi-button"><!--Don't need to say how many buttons there will be, handled on lines 42-93-->
          <button class="fas fa-heart"></button>
          <button class="fas fa-heart"></button>
          <button class="fas fa-heart"></button>
        </div>
        <div class="container"></div>
    </div>
</div>
<div class="cardMinimal">
    <div class="card" style="--background:#3C3B3D; --text:white;">
        <div class="multi-button"><!--Don't need to say how many buttons there will be, handled on lines 42-93-->
          <button class="fas fa-heart"></button>
        </div>
        <div class="container"></div>
    </div>
</div>
<div class="cardMinimal">
    <div class="card" style="--background:#3C3B3D; --text:white;">
        <div class="multi-button"><!--Don't need to say how many buttons there will be, handled on lines 42-93-->
          <button class="fas fa-heart"></button>
        </div>
        <div class="container"></div>
    </div>
</div>
<div class="cardMinimal">
    <div class="card" style="--background:#3C3B3D; --text:white;">
        <div class="multi-button"><!--Don't need to say how many buttons there will be, handled on lines 42-93-->
          <button class="fas fa-heart"></button>
        </div>
        <div class="container"></div>
    </div>
</div> --}}


