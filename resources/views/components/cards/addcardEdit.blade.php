<div class="multi-button"  style="{{$attributes['style2']}}">
    <button class="fas fa-heart" wire:click="clickNext1()"></button>
</div>
<div class="containerEdit"  style="{{$attributes['style1']}}">
    <div class="mainText" style=" height: 99%;" >
        <textarea wire:model.defer="text" maxlength="255" class="texForTexarea"></textarea>
    </div>
    <div class="articles__footer">
        <div  class="select" style="{{$attributes['backgroundscrollBar']}}">
            <div class="select__head">{{$attributes['tag']}}</div>
            <ul class="select__list" style="display: none;">
                @foreach ($selectTags as $selectTag)
                    <li x-data x-on:click="$wire.set('selectedTag', {{$selectTag->id}})" class="select__item">{{$selectTag->tag}}</li>
                @endforeach
            </ul>
        </div>
        <time title="{{$attributes['timeCreate']}}">{{$attributes['dateCreate']}}</time>
    </div>
</div>



<script>
    jQuery(($) => {
        $('.select').on('click', '.select__head', function () {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
                $(this).next().fadeOut();
            } else {
                $('.select__head').removeClass('open');
                $('.select__list').fadeOut();
                $(this).addClass('open');
                $(this).next().fadeIn();
            }
        });

        $('.select').on('click', '.select__item', function () {
            $('.select__head').removeClass('open');
            $(this).parent().fadeOut();
            $(this).parent().prev().text($(this).text());
            // document.getElementById("select__input").value = $(this).attr("idselect");
            // alert($(this).attr("idselect"));
            // $(this).parent().prev().prev().val($(this).attr("idselect"));
            // $(this).parent().prev().prev().text($(this).attr("idselect"));
        });

        $(document).click(function (e) {
            if (!$(e.target).closest('.select').length) {
                $('.select__head').removeClass('open');
                $('.select__list').fadeOut();
            }
        });
    });
</script>

