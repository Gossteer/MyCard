<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\StyleCard;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MainHome extends Component
{
    public $cards;
    // public $endcard;
    public $background;
    public $textbackground;
    public $component_edit_text;
    public $source;
    public $text;
    public $checkmaxCards;
    public $selectTags;
    public $textbutton;
    public $backgroundbutton;
    public $backgroundMain;
    public $textbuttonMain;
    public $dateCreate;
    public $timeCreate;
    public $selectedTag;
    public $allstyles;
    public $backgroundscrollBar;
    public $user_id;
    public $countMaxCardForUser = 5;
    public $lastcardstyle;
    public $countstyles;

    protected $listeners = ['deletecard' => 'deletecard', 'aftercreateordelete' => 'aftercreateordelete'];

    public function mount()
    {
        $this->allstyles = StyleCard::all();
        $this->countstyles = $this->allstyles->count();
        $this->user_id = Auth::user()->id;
        $this->selectTags = Tag::all();
        $this->aftercreateordelete();
        $this->uploudall();
    }

    public function aftercreateordelete()
    {
        $this->cards = Card::where('user_id', $this->user_id)->get();
        $this->lastcardstyle = $this->cards->last()->style_card_id ?? 1;
        $this->resetcolor();
    }

    public function resetcolor()
    {
        $this->colorchengfirst($this->allstyles->find($this->lastcardstyle)->background,$this->allstyles->find($this->lastcardstyle)->text);
        $this->colorchengmain($this->background,$this->textbackground);
        $this->colorcheng($this->background,$this->textbackground);
    }

    public function deletecard($id)
    {
        Card::find($id)->delete();
        if ($id == $this->cards->last()->id) {
            $this->aftercreateordelete();
        } else {
            $this->cards = Card::where('user_id', $this->user_id)->get();
        }
    }

    public function uploudall()
    {
        $this->dateCreate = date("d.m.y");
        $this->timeCreate = date("H:i:s");
        $this->selectedTag = 1;
        $this->component_edit_text = 'cards.addcardShow';
        $this->text = '';
        $this->source = '';
    }

    public function render()
    {
        return view('livewire.main-home');
    }

    public function leftchengcolor()
    {
        $this->lastcardstyle--;
        $this->lastcardstyle == 0 ? $this->lastcardstyle = $this->countstyles : '';
        $this->resetcolor();
    }

    public function rightchengcolor()
    {
        $this->lastcardstyle == $this->countstyles ? $this->lastcardstyle = 1 : $this->lastcardstyle++;
        $this->resetcolor();
    }

    // Проработать двойной клик
    // Сделать валидацию на объём сымволов и другое
    // Сделать возможность добавления собственных тэгов
    // Добавить группы карточек (автоматическое объединение оных при одинаковых тегах
    // Сделать плавную анимацию перехода цветов

    public function colorchengfirst($background = '#3C3B3D', $textbackground = '#ffffff')
    {
        $this->background = $background;
        $this->textbackground = $textbackground;
    }

    public function colorchengmain($background = '#3C3B3D', $textbackground = '#ffffff')
    {
        $this->backgroundMain =  $background;
        $this->textbuttonMain =  $textbackground;
        $this->backgroundscrollBar = sscanf($textbackground, "#%02x%02x%02x");
    }

    public function colorcheng($background = '#3C3B3D', $textbackground = '#ffffff')
    {
        $this->backgroundbutton = $background;
        $this->textbutton = $textbackground;
    }

    public function clickNext1()
    {
        $this->validate([
            'text' => 'required|min:6',
            'selectedTag' => 'required|exists:tags,id',
        ]);
        $this->colorchengmain($this->textbackground,$this->background);
        $this->colorcheng($this->background,$this->textbackground);
        $this->component_edit_text = 'cards.addcardEditSource';
    }

    public function clickBack1()
    {
        $this->colorchengmain($this->textbackground,$this->background);
        $this->colorcheng($this->background,$this->textbackground);
        $this->component_edit_text = 'cards.addcardEdit';
    }

    public function clickNext2()
    {
        $this->validate([
            'source' => 'required|min:6'
        ]);
        $this->colorchengmain($this->background,$this->textbackground);
        $this->colorcheng($this->background,$this->textbackground);
        $this->component_edit_text = 'cards.addcardPreview';
    }

    public function clickBack2()
    {
        $this->colorchengmain($this->textbackground,$this->background);
        $this->colorcheng($this->textbackground,$this->background);
        $this->component_edit_text = 'cards.addcardEditSource';
    }

    public function clickNext3()
    {
        $this->validate([
            'stylecard' => 'required|exists:style_cards,id',
        ]);
        $this->maxCards();
        if (!$this->checkmaxCards) {
            Card::create([
                'text' => $this->text,
                'source' => $this->source,
                'user_id' => $this->user_id,
                'style_card_id' => $this->lastcardstyle,
                'tag_id' => $this->selectedTag,
            ]);
            $this->aftercreateordelete();
            $this->uploudall();
        }
    }

    public function maxCards()
    {
        $this->checkmaxCards = ($this->cards->count() + 1) > $this->countMaxCardForUser ? true : '';
    }

    public function click_edit()
    {
        $this->colorchengmain($this->textbackground,$this->background);
        $this->colorcheng($this->textbackground,$this->background);
        $this->component_edit_text = 'cards.addcardEdit';
    }

    public function click_chow()
    {
        $this->uploudall();
        $this->aftercreateordelete();
    }
}
