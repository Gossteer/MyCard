<div>
    {{-- <div class="flex-1" style="padding: 25px 0 0;">
        <select name="searchtag" wire:model="searchtag" class="w-full border bg-white rounded px-3 py-2 outline-none">
            <option value="0" class="py-1">{{__('Все')}}</option>
            @foreach ($selectTags as $selectTag)
                <option value="{{$selectTag->id}}" class="py-1">{{$selectTag->tag}}</option>
            @endforeach
        </select>
    </div> --}}
    @if (!$open_category)
        <div class="cardMinimal">
            <div class="card" style="--background:#cc0000; --text:#ffffff;" >
                <a>
                    <h1>{{$selectTags[$keytag-1]->tag}}</h1>
                    <div class="containerEdit" style="cursor: pointer; --backgroundbutton:#ffffff; --textbutton:#cc0000;" wire:click="click_open_category()" >
                        <div class="mainText h-48 self-center flex flex-wrap content-center" >
                            <div >
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" >
                                    <image href="{{ asset('images/bookopen.svg') }}" height="100%" width="100%"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if ($open_category)
        {{-- <div style="cursor: pointer" wire:click="click_open_category()" wire:key="{{ $key }}"> --}}
        @livewire('main-home', ['allstyles' => &$allstyles, 'selectTags' => &$selectTags, 'cards' => &$cards, 'keytag' => $keytag], key($keytag.'tagcontainer'))
        {{-- </div> --}}
    @endif
</div>

