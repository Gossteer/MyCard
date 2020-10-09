<div class="articles__content {{$attributes['styleLefttText']}}" >
    <h2 class="articles__title">{{$attributes['text']}}</h2>
  <div class="articles__footer">
    <p>Cakes</p>
    <time>1 Jan 2010</time>
  </div>
</div>
<div class="articles__content {{$attributes['styleRightText']}}" aria-hidden="true">
    <h2 class="articles__title">{{$attributes['text']}}</h2>
  <div class="articles__footer">
    <p>Cakes</p>
    <time>1 Jan 2010</time>
  </div>
</div>


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
                // document.getElementById('link_tag').classList.remove('articles__link')
                clearTimeout(pendingClick);
                break;

            default:

                break;
        }
    }


    // document.getElementsByName('link_tag_show').item(0).addEventListener('click', xorClick, false);

</script>


