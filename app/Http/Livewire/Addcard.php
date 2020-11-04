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
    public $backgroundMain;
    public $textbuttonMain;
    public $dateCreate;
    public $timeCreate;
    public $selectedTag;

    public function render()
    {
        return view('livewire.addcard');
    }

    public function mount()
    {
        $this->dateCreate = date("d.m.y");
        $this->timeCreate = date("H:i:s");
        $this->selectTags = Tag::all();
        $this->backgroundMain = $this->background;
        $this->textbuttonMain = $this->textbackground;
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
    }
    //Сделать возможность добавления собственных тэгов
    //Сделать валидацию на объём сымволов и другое
    public function clickNext1()
    {
        $this->component_edit_text = 'cards.addcardEditSource';
        $this->tag = Tag::find($this->selectedTag)->tag ?? 'Общее';
        $this->texForTexarea = $this->text;
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
        $this->backgroundMain = $this->textbackground;
        $this->textbuttonMain =  $this->background;
    }

    public function clickBack1()
    {
        $this->component_edit_text = 'cards.addcardEdit';
    }

    public function clickNext2()
    {
        $this->component_edit_text = 'cards.addcardPreview';
    }

    public function clickBack2()
    {
        $this->component_edit_text = 'cards.addcardEditSource';
    }

    public function clickNext3()
    {

    }

    public function click_edit()
    {
        $this->textbuttonMain =  $this->background;
        $this->backgroundMain =  $this->textbackground;
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
