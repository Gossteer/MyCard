    <li class="articles__article" style="--animation-order:1">
        <a   id="link_tag" target="_blank" wire:dblclick="lol" class="articles__link">
        <div class="articles__content articles__content--lhs">
            <div class="articles__toper mb-1">
                <button wire:click="component_edit_text_cheng">lol</button>
                <p  class="ml-1">{{$textt}}</p>
            </div>
            <x-dynamic-component :component="$component_edit_text" class="articles__title" text="Чебурек не человек, человек не чебурек"   />
          <div class="articles__footer">
            <p>Cakes</p>
          </div>
        </div>
        <div class="articles__content articles__content--rhs" aria-hidden="true">
            <div class="articles__toper mb-1">
                <p class="ml-1">lol</p>
                <p >lol1</p>
            </div>
            <x-dynamic-component :component="$component_edit_text" class="articles__title"  text="Чебурек не человек, человек не чебурек"/>
          <div class="articles__footer">
            <p>Cakes</p>
            <time>1 Jan 2010</time>
          </div>
        </div></a>
    </li>

    <script>
        var pendingClick = 0;

        function xorClick(e) {
            if (pendingClick) {
                clearTimeout(pendingClick);
                pendingClick = 0;
            }

            switch (e.detail) {
                case 1:
                    pendingClick = setTimeout(() => {
                        window.open("http://htmlbook.ru/html/a")
                    }, 500);
                    break;
                case 2:
                    console.log('liiil')
                    break;

                default:
                    console.log('luuul')
                    break;
            }
        }


        link_tag.addEventListener('click', xorClick, false);

    </script>


