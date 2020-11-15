<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="click_edit_cource()"></button>
    <button class="fas fa-heart" wire:click="removecards()"></button>
    <button class="fas fa-heart" wire:click="click_chow()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 94%;" >
        <textarea class="texForTexarea" maxlength="255" wire:model.defer="text" style="{{$attributes['backgroundscrollBar']}}">{{$attributes['text']}}</textarea>
    </div>
    <div class="articles__footer">
        <div  class="select" id="selectcard{{$attributes['idCard']}}" style="{{$attributes['backgroundscrollBar']}}">
            <div class="select__head" id="selectheadcard{{$attributes['idCard']}}">{{$attributes['tag']}}</div>
            <ul class="select__list" id="selectlistcard{{$attributes['idCard']}}" style="display: none;">
                @foreach ($selectTagsforcard as $selectTagforcard)
                    <li x-data x-on:click="$wire.set('selectedTagforcard', {{$selectTagforcard->id}})" class="select__item" id="selectlistitemcard{{$attributes['idCard']}}">{{$selectTagforcard->tag}}</li>
                @endforeach
            </ul>
        </div>
        <time title="{{$attributes['datatime']}}">{{$attributes['data']}}</time>
    </div>
</div>

{{--
     Сделать валидацию данных
     Проработать двойной клик и последующую смену стилей
    --}}

    <script>
        jQuery(($) => {
            $('#selectcard{{$attributes['idCard']}}').on('click', '#selectheadcard{{$attributes['idCard']}}', function () {
                if ($(this).hasClass('open')) {
                    $(this).removeClass('open');
                    $(this).next().fadeOut();
                } else {
                    $('#selectheadcard{{$attributes['idCard']}}').removeClass('open');
                    $('#selectlistcard{{$attributes['idCard']}}').fadeOut();
                    $(this).addClass('open');
                    $(this).next().fadeIn();
                }
            });

            $('#selectcard{{$attributes['idCard']}}').on('click', '#selectlistitemcard{{$attributes['idCard']}}', function () {
                $('#selectheadcard{{$attributes['idCard']}}').removeClass('open');
                $(this).parent().fadeOut();
                $(this).parent().prev().text($(this).text());
                // $(this).parent().prev().prev().val($(this).attr("idselect"));
                // $(this).parent().prev().prev().text($(this).attr("idselect"));
            });

            $(document).click(function (e) {
                if (!$(e.target).closest('#selectcard{{$attributes['idCard']}}').length) {
                    $('#selectheadcard{{$attributes['idCard']}}').removeClass('open');
                    $('#selectlistcard{{$attributes['idCard']}}').fadeOut();
                }
            });
        });
    </script>




