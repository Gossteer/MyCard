{{-- <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex space-x-4">
            <div class="flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Библиотека') }}
                </h2>
            </div>
            <div class="flex-1 form__group field">
                <input type="text" class="form__field" wire:model="searchcard" placeholder="Поиск" name="search"/>
                <label for="search" class="form__label">Поиск</label>
            </div>
        </div>
    </div>
</header> --}}




<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end">
            <div class="inline-flex space-x-4">
                <div class="flex-1" style="padding: 25px 0 0;">
                    <select name="searchtag" wire:model="searchtag" class="w-full border bg-white rounded px-3 py-2 outline-none">
                        <option value="0" class="py-1">{{__('Все')}}</option>
                        @foreach ($selectTags as $selectTag)
                            <option value="{{$selectTag->id}}" class="py-1">{{$selectTag->tag}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1 form__group field">
                    <input type="text" id="form__field_id" class="form__field" wire:model="searchcard" placeholder="Поиск" name="search"/>
                    <label for="search" onclick="form_label_click()"  class="form__label">Поиск</label>
                </div>
            </div>
        </div>
        <div class="cardMinimal">
            @foreach ($cards as $card)
                @livewire('cards', [ 'selectTagsforcard' => $selectTags, 'countstyles' => $countstyles, 'cardselect' => $card, 'allstylesforcard' => $allstyles], key($card->id))
            @endforeach
            {{-- @livewire('addcard', ['background' => $endcard->stylecard->background ?? '#3C3B3D',
            'textbackground' => $endcard->stylecard->text ?? '#ffffff']) --}}
            <div class="cardMinimal">
                <div class="card" style="--background:{{$backgroundMain}}; --text:{{$textbuttonMain}};" >
                    <x-dynamic-component :component="$component_edit_text" source="{{$cardadd->source}}"
                    style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
                    style2="--backgroundbutton:{{$backgroundMain}}; --textbutton:{{$textbuttonMain}};"
                    text="{{$cardadd->text}}" :selectTags="$selectTags"  timeCreate="{{$timeCreate}}"
                    dateCreate="{{$dateCreate}}" tag="{{$cardadd->tag->tag}}" {{-- Лучше так делать? Через модель? Или через поиск
                        по уже выгруженным тегам по id тега карты? Идёт ли обращение к базе данных при работе с моделью? --}}
                    backgroundscrollBar="--backgroundscrollBarHide:{{$backgroundscrollBar[0]}},{{$backgroundscrollBar[1]}},
                    {{$backgroundscrollBar[2]}};--backgroundscrollBar:{{$textbuttonMain}}"/>
                </div>
            </div>
    </div>
</div>

<script>
    function form_label_click() {
        document.getElementById("form__field_id").focus();
    }
</script>





