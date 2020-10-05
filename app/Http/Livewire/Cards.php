<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cards extends Component
{
    public $component_edit_text = 'cards.meinTextCards';
    public $text= 'Чебурек не человек, человек не чебурек';
    public $linkHiden = true;

    public function component_edit_text_cheng()
    {
        $this->linkHiden = true;
        $this->component_edit_text = 'cards.meinTextCardsCheng';
    }

    public function render()
    {
        return view('livewire.cards');
    }
}
