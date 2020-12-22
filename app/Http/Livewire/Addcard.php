<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Addcard extends Component
{
    public $background;
    public $textbackground;
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
    public $backgroundscrollBar;

    public function render()
    {
        return view('livewire.addcard');
    }

    protected $rules = [
        'text' => 'required|min:6',
        'selectedTagforcard' => 'required|exists:tags,id',
        'stylecard' => 'required|exists:style_cards,id',
        'source' => 'required|min:6',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->dateCreate = date("d.m.y");
        $this->timeCreate = date("H:i:s");
        $this->selectTags = Tag::all();
        $this->selectedTag = 1;
        $this->backgroundMain = $this->background;
        $this->textbuttonMain = $this->textbackground;
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
        $this->backgroundscrollBar = sscanf($this->textbutton, "#%02x%02x%02x");
    }
    //Сделать возможность добавления собственных тэгов
    //Сделать валидацию на объём сымволов и другое

    public function clickNext1()
    {
        $this->validate();

        $this->component_edit_text = 'cards.addcardEditSource';
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
        Card::create([
            'text' => $this->text,
            'source' => $this->source,
            'user_id' => Auth::user()->id,
            // 'style_card_id' => ,
            'tag_id'
        ]);
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
