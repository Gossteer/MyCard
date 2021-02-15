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
    public $background;
    public $textbackground;
    public $component_edit_text;
    public $selectTags;
    public $textbutton;
    public $checkmaxCards;
    public $backgroundbutton;
    public $backgroundMain;
    public $textbuttonMain;
    public $dateCreate;
    public $timeCreate;
    public $allstyles;
    public $backgroundscrollBar;
    public $user_id;
    public $cardadd;
    const countMaxCardForUser = 100;
    public $laststylecardid;
    public $countstyles;
    public $lastcardid;
    public $searchcard;
    public $searchtag;


    protected $rules = [
        'cardadd.text' => 'required|min:6',
        'cardadd.tag_id' => 'required|exists:tags,id',
        'cardadd.style_card_id' => 'required|exists:style_cards,id',
        'cardadd.source' => 'required|min:6',
        'cardadd.user_id' => 'required'
    ];

    protected $listeners = ['deletecard' => 'deletecard', 'reload' => 'reload'];

    public function render()
    {
        $this->getCards();

        return view('livewire.main-home', [
            'cards' => $this->cards
        ]);
    }


    public function mount()
    {
        $this->allstyles = StyleCard::all();
        $this->countstyles = $this->allstyles->count();
        $this->user_id = Auth::user()->id;
        $this->selectTags = Tag::all();
        $this->afterCreate();
    }

    // public function aftercreateordelete()
    // {
    //     $this->getCards();
    //     $this->getLastStyleCardId();
    //     $this->newCard();
    //     $this->resetcolor();
    // }

    public function getLastStyleCardId()
    {
        $this->laststylecardid =  $this->cards->last()->style_card_id ?? 1;
    }

    public function getLastCardId()
    {
        $this->lastcardid =  $this->cards->last()->id ?? null;
    }

    public function getCards()
    {
        if ($this->searchtag and $this->searchcard) {
            $this->cards = Card::where('text', 'like', '%'.$this->searchcard.'%')->where('user_id', $this->user_id)->where('tag_id', $this->searchtag)->get();
            return;
        } if ($this->searchtag) {
            $this->cards = Card::where('user_id', $this->user_id)->where('tag_id', $this->searchtag)->get();
            return;
        } if($this->searchcard) {
            $this->cards = Card::where('text', 'like', '%'.$this->searchcard.'%')->where('user_id', $this->user_id)->get();
            return;
        } else {
            $this->cards = Card::where('user_id', $this->user_id)->get();
        }

    }

    public function afterCreate()
    {
        $this->getCards();
        $this->getLastStyleCardId();
        $this->getLastCardId();
        $this->click_chow();
    }

    public function afterDelete(int $id)
    {
        if ($id == $this->lastcardid) {
            $this->getCards();
            $this->getLastStyleCardId();
            $this->getLastCardId();
            $this->updateAddCard('style_card_id',  $this->laststylecardid);
            $this->resetcolor();
        } else {
            $this->getCards();
        }
    }

    public function reload(int $id)
    {

        if ($id == $this->lastcardid) {
            $this->getLastStyleCardId();
            $this->updateAddCard('style_card_id',  $this->laststylecardid);
            if ( $this->component_edit_text == 'cards.addcardShow') {
                $this->resetcolor();
            } else {
                $this->colorchengfirst($this->allstyles->find($this->cardadd->style_card_id)->background,$this->allstyles->find($this->cardadd->style_card_id)->text);
                $this->colorchengmain($this->textbackground,$this->background);
                $this->colorcheng($this->textbackground,$this->background);
            }
        }
    }

    public function reloadDate()
    {
        $this->dateCreate = date("d.m.y");
        $this->timeCreate = date("H:i:s");
    }

    public function resetcolor()
    {
        $this->colorchengfirst($this->allstyles->find($this->cardadd->style_card_id)->background,$this->allstyles->find($this->cardadd->style_card_id)->text);
        $this->colorchengmain($this->background,$this->textbackground);
        $this->colorcheng($this->background,$this->textbackground);
    }

    public function newCard()
    {
        $this->cardadd = new Card();
        $this->cardadd->fill(['tag_id' => 1]);
        $this->cardadd->fill(['user_id' => $this->user_id]);
        $this->cardadd->fill(['style_card_id' => $this->laststylecardid]);
    }

    public function updateAddCard(string $fill, $value)
    {
        $this->cardadd->fill([$fill => $value]);
    }

    public function deletecard($id)
    {
        Card::find($id)->delete();
        $this->afterDelete($id);
    }

    public function leftchengcolor()
    {
        $this->cardadd->style_card_id--;
        $this->cardadd->style_card_id== 0 ? $this->cardadd->style_card_id= $this->countstyles : '';
        $this->resetcolor();
    }

    public function rightchengcolor()
    {
        $this->cardadd->style_card_id== $this->countstyles ? $this->cardadd->style_card_id= 1 : $this->cardadd->style_card_id++;
        $this->resetcolor();
    }

    //Проверку на то, что пользователь изменяет/удалёт/создаёт именно свои карточки
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
            'cardadd.text' => 'required|min:6',
            'cardadd.tag_id' => 'required|exists:tags,id',
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
            'cardadd.source' => 'required|min:6'
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
            'cardadd.style_card_id' => 'required|exists:style_cards,id',
        ]);
        if ($this->cardadd->user_id == $this->user_id) {
            if (!$this->maxCards()) {
                $this->cardadd->save();
                $this->afterCreate();
            }
        } else {
            $this->afterCreate();
        }

    }

    public function maxCards() : bool
    {
        $this->checkmaxCards = ($this->cards->count() + 1) > self::countMaxCardForUser ? true : '';
        return $this->checkmaxCards;
    }

    public function click_edit()
    {
        $this->reloadDate();
        $this->colorchengmain($this->textbackground,$this->background);
        $this->colorcheng($this->textbackground,$this->background);
        $this->component_edit_text = 'cards.addcardEdit';
    }

    public function click_chow()
    {
        $this->newCard();
        $this->resetcolor();
        $this->component_edit_text = 'cards.addcardShow';
    }
}
