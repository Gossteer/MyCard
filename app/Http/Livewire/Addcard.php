<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class Addcard extends Component
{
    public $background;
    public $textbackground;
    public $tag;
    public $component_edit_text = 'cards.addcardShow';
    public $source;
    public $text;
    public $selectTags;
    public $texForTexarea;
    public $click = 'click_edit';
    public $textbutton;
    public $backgroundbutton;

    public function render()
    {
        return view('livewire.addcard');
    }

    public function mount()
    {
        $this->selectTags = Tag::all()->toArray();
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
    }
    //Сделать возможность добавления собственных тэгов
    //Сделать валидацию на объём сымволов и другое
    public function clickNext1()
    {
        $this->texForTexarea = $this->text;
        $this->component_edit_text = 'cards.addcardEditTag';
    }

    public function clickNext2()
    {

    }

    // public function clickNext3()
    // {

    // }

    public function click_edit()
    {
        $this->backgroundbutton = $this->textbackground;
        $this->textbutton = $this->background;
        $this->component_edit_text = 'cards.addcardEdit';
        $this->click = 'click_chow';
    }

    public function click_chow()
    {
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
        $this->component_edit_text = 'cards.addcardShow';
        $this->click = 'click_edit';
    }
}
