<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cards extends Component
{
    public $cardsAttributes = array(
        'text' => 'Чебурек не человек, человек не чебурек',
        'data' => '1 Jan 2010',
        'tag' => 'Cakes',
        'style' => '',
        'component_edit_text' => 'cards.cardsMinimalShow',
        'source' => 'https://portal.niip.ru/stream/',
        'click' => 'click_edit',
        'backgroundbutton' => '#3C3B3D',
        'textbutton' => 'white',
    );

    public function click_edit()
    {
        $this->cardsAttributes['backgroundbutton'] = 'white';
        $this->cardsAttributes['textbutton'] = '#3C3B3D';
        $this->cardsAttributes['component_edit_text'] = 'cards.cardsMinimalEdit';
        $this->cardsAttributes['click'] = 'click_chow';
    }

    public function click_chow()
    {
        $this->cardsAttributes['backgroundbutton'] = '#3C3B3D';
        $this->cardsAttributes['textbutton'] = 'white';
        $this->cardsAttributes['component_edit_text'] = 'cards.cardsMinimalShow';
        $this->cardsAttributes['click'] = 'click_edit';
    }



    public function render()
    {
        return view('livewire.cards');
    }
}
