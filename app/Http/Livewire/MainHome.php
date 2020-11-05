<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MainHome extends Component
{
    public $cards;
    public $endcard;
    public $background;
    public $textbackground;
    public $component_edit_text;
    public $source;
    public $text;
    public $selectTags;
    public $click;
    public $textbutton;
    public $backgroundbutton;
    public $backgroundMain;
    public $textbuttonMain;
    public $dateCreate;
    public $timeCreate;
    public $selectedTag;
    public $backgroundscrollBar;
    public $user_id;

    // protected $listeners = ['aftercreate' => 'aftercreate'];

    // public function mount()
    // {
    //     $this->user_id = Auth::user()->id;
    //     $this->aftercreate();
    // }

    // public function aftercreate()
    // {
    //     $this->cards = Card::where('user_id', $this->user_id)->get();
    //     $this->endcard = $this->cards->last();
    // }

    protected $listeners = ['deletecard' => 'deletecard'];

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->selectTags = Tag::all();
        $this->aftercreateordelete();
    }

    public function aftercreateordelete()
    {
        $this->cards = Card::where('user_id', $this->user_id)->get();
        $this->endcard = $this->cards->last();
        $this->uploudall();
    }

    public function deletecard($id)
    {
        Card::find($id)->delete();
        $this->aftercreateordelete();
    }

    public function uploudall()
    {
        $this->dateCreate = date("d.m.y");
        $this->timeCreate = date("H:i:s");
        $this->selectedTag = 1;
        $this->background = $this->endcard->stylecard->background ?? '#3C3B3D';
        $this->textbackground = $this->endcard->stylecard->text ?? '#ffffff';
        $this->backgroundMain = $this->background;
        $this->textbuttonMain = $this->textbackground;
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
        $this->backgroundscrollBar = sscanf($this->textbutton, "#%02x%02x%02x");
        $this->click = 'click_edit';
        $this->component_edit_text = 'cards.addcardShow';
        $this->text = '';
        $this->source = '';
    }

    public function render()
    {
        return view('livewire.main-home');
    }

    //Сделать возможность добавления собственных тэгов
    //Сделать валидацию на объём сымволов и другое

    public function clickNext1()
    {
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
            'user_id' => $this->user_id,
            // 'style_card_id' => ,
            'tag_id' => $this->selectedTag,
        ]);
        // $this->cards = Card::where('user_id', $this->user_id)->get();
        // $this->endcard = $this->cards->last();
        $this->aftercreateordelete();
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
