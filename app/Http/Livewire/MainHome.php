<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MainHome extends Component
{
    public $cards, $cardcontainers;
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
    public $searchtag, $keytag;
    public $methodaddcardshow, $component_category_text;


    protected $rules = [
        'cardadd.text' => 'required|min:6',
        'cardadd.tag_id' => 'required|exists:tags,id',
        'cardadd.style_card_id' => 'required|exists:style_cards,id',
        'cardadd.source' => 'required|min:6',
        'cardadd.user_id' => 'required'
    ];

    protected $listeners = ['deletecard' => 'deletecard', 'reload' => 'reload', 'addCardToCollection'];

    public function render()
    {
        $this->renderGetCards();
        // dd($this->cardcontainers);
        return view('livewire.main-home', [
            'cardcontainers' => $this->cardcontainers
        ]);
    }

    public function addCardToCollection(Card $card)
    {
        if ($card->tag_id == $this->keytag) {
            $this->cards->push($card);
            $this->afterCreate();
        }
    }

    public function renderGetCards()
    {
        if ($this->searchtag and $this->searchcard) {
            $this->getCards(3);
            return;
        }
        if ($this->searchtag) {
            $this->getCards(2);
            return;
        }
        if($this->searchcard) {
            $this->getCards(1);
            return;
        }
        if ($this->searchtag === '0' or $this->searchcard === '') {
            $this->getCards(4);
            return;
        }
    }

    public function mount()
    {
        $this->countstyles = $this->allstyles->count();
        $this->afterCreate();
        $this->methodaddcardshow = "getConponentCardsCategory()";
        $this->component_category_text = 'cards.addcardShow';
    }

    public function getConponentCardsCategory()
    {
        $this->methodaddcardshow = "click_edit()";
        $this->component_category_text = 'cards.categorycards';
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

    public function getCards(int $variable = 0)
    {

        $searchcard = mb_strtolower($this->searchcard, 'UTF-8');
        switch ($variable) {
            case 0:
                $cards = $this->cards;
                break;
            case 1:
                $cards = $this->cards->where('user_id', Auth::user()->id)->filter(function ($card) use($searchcard) {
                    return mb_strpos(mb_strtolower($card->text, 'UTF-8'), (string) $searchcard, 0, 'UTF-8') !== false;
                });
                break;
            case 2:
                $cards = $this->cards->where('user_id', Auth::user()->id)->where('tag_id', $this->searchtag);
                break;
            case 3:
                $cards = $this->cards->where('user_id', Auth::user()->id)->where('tag_id', $this->searchtag)->filter(function ($card) use($searchcard) {
                    return mb_strpos(mb_strtolower($card->text, 'UTF-8'), (string) $searchcard, 0, 'UTF-8') !== false;
                });;
                break;
            case 4:
                $cards = $this->cards;
                break;
        }

        $this->cardcontainers = $cards;
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
        $this->cardadd->fill(['tag_id' => $this->keytag]);
        $this->cardadd->fill(['user_id' => Auth::user()->id]);
        $this->cardadd->fill(['style_card_id' => $this->laststylecardid]);
    }

    public function updateAddCard(string $fill, $value)
    {
        $this->cardadd->fill([$fill => $value]);
    }

    public function deletecard($id)
    {
        // Card::find($id)->delete();
        $this->cards->find($id)->delete();
        $this->cards = $this->cards->except([$id]);
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
        if ($this->cardadd->user_id == Auth::user()->id) {
            if (!$this->maxCards()) {
                $this->cardadd->save();
                $this->emitTo('main-home', 'addCardToCollection', $this->cardadd->id);
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
