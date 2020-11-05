<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="cardMinimal">
            @foreach ($cards as $card)
                @livewire('cards', [ 'selectTagsforcard' => $selectTags, 'idCard' => $card->id ,'text' => $card->text,
                'data' =>$card->created_at, 'source' => $card->source, 'background' => $card->stylecard->background, 'selectedTagforcard' => $card->tag->id,
                'textbackground' => $card->stylecard->text, 'backgroundscrollBar' => "--backgroundscrollBarHide:" . $backgroundscrollBar[0].",".$backgroundscrollBar[1].",".$backgroundscrollBar[2].";--backgroundscrollBar:".$textbuttonMain
                ], key($card->id))
            @endforeach
            {{-- @livewire('addcard', ['background' => $endcard->stylecard->background ?? '#3C3B3D',
            'textbackground' => $endcard->stylecard->text ?? '#ffffff']) --}}
            <div class="cardMinimal">
                <div class="card" style="--background:{{$backgroundMain}}; --text:{{$textbuttonMain}};" >
                    <x-dynamic-component :component="$component_edit_text" click="{{$click}}" source="{{$source}}"
                    style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
                    style2="--backgroundbutton:{{$backgroundMain}}; --textbutton:{{$textbuttonMain}};"
                    source="{{$source}}" text="{{$text}}" :selectTags="$selectTags"
                    timeCreate="{{$timeCreate}}" dateCreate="{{$dateCreate}}" :selectedTag="$selectedTag" tag="{{$selectTags->find($selectedTag)->tag}}"
                    backgroundscrollBar="--backgroundscrollBarHide:{{$backgroundscrollBar[0]}},{{$backgroundscrollBar[1]}},{{$backgroundscrollBar[2]}};--backgroundscrollBar:{{$backgroundMain}}"/>
                </div>
            </div>
    </div>
</div>




