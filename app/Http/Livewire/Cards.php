<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cards extends Component
{
    public $cardsAttributes = array(
        'text' => 'Чебурек не человек, человек не чебурек',
        'styleRightText' => 'articles__content--rhs',
        'styleLefttText' => 'articles__content--lhs',
        'component_edit_text' => 'cards.cardsShow',
        'dblclick' => 'dblclick_show',
        'onclick' => 'xorClick(event)',
        'hiddenRightSideCard' => '',
        'articles__link' => 'articles__link'
    );

    public function dblclick_show()
    {
        $this->cardsAttributes['component_edit_text'] = 'cards.cardsEdit';
        $this->cardsAttributes['articles__link'] = 'articles__link_edit';
        $this->cardsAttributes['styleRightText'] = 'articles__content--rhss';
        $this->cardsAttributes['styleLefttText'] = 'articles__content--lhss';
        $this->cardsAttributes['text'] = 'Чебурек не человек, человек не чебурек';
        $this->cardsAttributes['dblclick'] = 'dblclick_edit';
        $this->cardsAttributes['onclick'] = '';
    }

    public function dblclick_edit()
    {
        $this->cardsAttributes['dblclick'] = 'dblclick_show';
        $this->cardsAttributes['articles__link'] = 'articles__link';
        $this->cardsAttributes['component_edit_text'] = 'cards.cardsShow';
        $this->cardsAttributes['styleRightText'] = 'articles__content--rhs';
        $this->cardsAttributes['styleLefttText'] = 'articles__content--lhs';
        $this->cardsAttributes['text'] = 'Чебурек не человек, человек не чебурек';
        $this->cardsAttributes['onclick'] = 'xorClick(event)';
    }

    public function render()
    {
        return view('livewire.cards');
    }
}
