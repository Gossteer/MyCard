<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end">
            <div class="inline-flex space-x-4">
                <div class="flex-1" style="padding: 25px 0 0;">
                    <a style="cursor: pointer" wire:click="$emitUp('click_open_category')">
                        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <image href="{{ asset('images/bookclose.svg') }}" height="100" width="100"/>
                        </svg>
                    </a>
                </div>
                <div class="flex-1 form__group field">
                    <input type="text" id="form__field_id{{$keytag}}" class="form__field" wire:model="searchcard" placeholder="Поиск" name="search"/>
                    <label for="form__field_id{{$keytag}}" class="form__label">Поиск</label>
                </div>
            </div>
        </div>
        <div class="cardMinimal">
            @foreach ($cardcontainers as $card)
                @livewire('cards', [ 'selectTagsforcard' => &$selectTags, 'countstyles' => &$countstyles, 'cardselect' => &$card, 'allstylesforcard' => &$allstyles], key($card['id']))
            @endforeach

            {{-- @livewire('addcard', ['background' => $endcard->stylecard->background ?? '#3C3B3D',
            'textbackground' => $endcard->stylecard->text ?? '#ffffff']) --}}
            <div class="cardMinimal">
                <div class="card" style="--background:{{$backgroundMain}}; --text:{{$textbuttonMain}};" >
                    <x-dynamic-component :component="$component_edit_text" :keytag="$keytag"
                    style1="--backgroundbutton:{{$textbutton}}; --textbutton:{{$backgroundbutton}};"
                    style2="--backgroundbutton:{{$backgroundMain}}; --textbutton:{{$textbuttonMain}};"
                    :selectTags="&$selectTags"  timeCreate="{{$timeCreate}}"
                    dateCreate="{{$dateCreate}}" :cardadd="$cardadd" {{-- Лучше так делать? Через модель? Или через поиск
                        по уже выгруженным тегам по id тега карты? Идёт ли обращение к базе данных при работе с моделью? --}}
                    backgroundscrollBar="--backgroundscrollBarHide:{{$backgroundscrollBar[0]}},{{$backgroundscrollBar[1]}},
                    {{$backgroundscrollBar[2]}};--backgroundscrollBar:{{$textbuttonMain}}"/>
                </div>
            </div>
        </div>
    </div>
</div>




