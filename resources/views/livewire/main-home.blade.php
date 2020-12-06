<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="cardMinimal">
            @foreach ($cards as $card)
                @livewire('cards', [ 'selectTagsforcard' => $selectTags, 'cardselect' => $card, 'allstylesforcard' => $allstyles], key($card->id))
            @endforeach
            {{-- @livewire('addcard', ['background' => $endcard->stylecard->background ?? '#3C3B3D',
            'textbackground' => $endcard->stylecard->text ?? '#ffffff']) --}}
            <div class="cardMinimal">
                <div class="card" style="--background:{{$backgroundMain}}; --text:{{$textbuttonMain}};" >
                    <x-dynamic-component :component="$component_edit_text" source="{{$source}}"
                    style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
                    style2="--backgroundbutton:{{$backgroundMain}}; --textbutton:{{$textbuttonMain}};"
                    text="{{$text}}" :selectTags="$selectTags"  timeCreate="{{$timeCreate}}" dateCreate="{{$dateCreate}}" tag="{{$selectTags->find($selectedTag)->tag}}"
                    backgroundscrollBar="--backgroundscrollBarHide:{{$backgroundscrollBar[0]}},{{$backgroundscrollBar[1]}},{{$backgroundscrollBar[2]}};--backgroundscrollBar:{{$textbuttonMain}}"/>
                </div>
            </div>
    </div>
</div>





