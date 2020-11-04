<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="cardMinimal">
            @foreach ($cards as $card)
                @livewire('cards', [ 'idCard' => $card->id ,'text' => $card->text, 'tag' => $card->tag->tag,
                'data' =>$card->created_at, 'source' => $card->source, 'background' => $card->stylecard->background,
                'textbackground' => $card->stylecard->text
                ])
            @endforeach
                     @livewire('addcard', ['background' => $endcard->stylecard->background ?? '#3C3B3D',
            'textbackground' => $endcard->stylecard->text ?? '#ffffff'])
    </div>
</div>




