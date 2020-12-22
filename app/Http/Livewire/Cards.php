<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class Cards extends Component
{
    // public $text;
    public $component_edit_text = 'cards.cardsMinimalShow';
    public $background;
    public $selectTagsforcard;
    public $textbackground;
    public $textbutton;
    public $backgroundbutton;
    public $backgroundscrollBar;
    public $cardselect;
    public $allstylesforcard;
    public $idCard;
    public $countstyles;

    protected $rules = [
        'cardselect.text' => 'required|min:6',
        'cardselect.tag_id' => 'required|exists:tags,id',
        'cardselect.style_card_id' => 'required|exists:style_cards,id',
        'cardselect.source' => 'required|min:6',
    ];

    function inverseHex( $color )
    {
        $color       = trim($color);
        $prependHash = FALSE;

        if(strpos($color,'#')!==FALSE) {
        $prependHash = TRUE;
        $color       = str_replace('#',NULL,$color);
        }

        switch($len=strlen($color)) {
        case 3:
        $color=preg_replace("/(.)(.)(.)/","\\1\\1\\2\\2\\3\\3",$color);
        break;
        case 6:
        break;
        default:
        trigger_error("Invalid hex length ($len). Must be a minimum length of (3) or maxium of (6) characters", E_USER_ERROR);
        }

        if(!preg_match('/^[a-f0-9]{6}$/i',$color)) {
        $color = htmlentities($color);
        trigger_error( "Invalid hex string #$color", E_USER_ERROR );
        }

        $r = dechex(255-hexdec(substr($color,0,2)));
        $r = (strlen($r)>1)?$r:'0'.$r;
        $g = dechex(255-hexdec(substr($color,2,2)));
        $g = (strlen($g)>1)?$g:'0'.$g;
        $b = dechex(255-hexdec(substr($color,4,2)));
        $b = (strlen($b)>1)?$b:'0'.$b;

        return ($prependHash?'#':NULL).$r.$g.$b;
    }

    public function mount()
    {
        $this->countstyles = $this->allstylesforcard->count(); //Попытаться взять у родительского контроллера (меинхом)
        $this->resetcolor();
        $this->idCard = $this->cardselect->id;
        //Выгружать в моунт саму карточку, брать от туда стили (присваивать), брать от туда id стиля. Сделать плавный переход хотя бы у кнопок
    }


    //сделать валидацию на объём сымволов и другое

    public function update()
    {
        $this->validate();

        Card::find($this->cardselect->id)->update([
            'text' => $this->cardselect->text,
            'source' => $this->cardselect->source,
            'tag_id' => $this->cardselect->tag_id,
            'style_card_id' => $this->cardselect->style_card_id,
        ]);
    }

    public function removecards()
    {
        $this->emitUp('deletecard', $this->cardselect->id);
    }

    public function resetcolor()
    {
        $this->colorchengfirst($this->allstylesforcard->find($this->cardselect->style_card_id)->background,$this->allstylesforcard->find($this->cardselect->style_card_id)->text);
        $this->colorcheng($this->background,$this->textbackground);
    }

    public function leftchengcolor()
    {
        $this->cardselect->style_card_id--;
        $this->cardselect->style_card_id == 0 ? $this->cardselect->style_card_id = $this->countstyles : '';
        $this->resetcolor();
        $this->update();
    }

    public function rightchengcolor()
    {
        $this->cardselect->style_card_id == $this->countstyles ? $this->cardselect->style_card_id = 1 : $this->cardselect->style_card_id++;
        $this->resetcolor();
        $this->update();
    }

    public function colorchengfirst($background = '#3C3B3D', $textbackground = '#ffffff')
    {
        $this->background = $background;
        $this->textbackground = $textbackground;
    }

    public function colorcheng($background = '#3C3B3D', $textbackground = '#ffffff')
    {
        $this->backgroundbutton = $background;
        $this->textbutton = $textbackground;
        $this->backgroundscrollBar = sscanf($this->textbutton, "#%02x%02x%02x");
    }

    public function click_preview()
    {
        $this->update();
        $this->colorcheng($this->background,$this->textbackground);
        $this->component_edit_text = 'cards.cardsMinimalPreview';
    }

    public function click_edit()
    {
        $this->component_edit_text = 'cards.cardsMinimalEdit';
        $this->colorcheng($this->textbackground, $this->background);
    }

    public function click_chow()
    {
        $this->update();
        $this->colorcheng($this->background,$this->textbackground);
        $this->component_edit_text = 'cards.cardsMinimalShow';
        $this->emitUp('aftercreateordelete');
    }

    public function click_edit_cource()
    {
        $this->update();
        $this->colorcheng($this->textbackground, $this->background);
        $this->component_edit_text = 'cards.cardsMinimalEditSource';
    }

    public function render()
    {
        return view('livewire.cards');
    }
}
