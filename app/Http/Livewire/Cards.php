<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class Cards extends Component
{
    public $text;
    public $textforEdit;
    public $data;
    public $datacard;
    public $idCard;
    public $tag;
    public $component_edit_text = 'cards.cardsMinimalShow';
    public $source;
    public $background;
    public $selectTagsforcard;
    public $selectedTagforcard;
    public $textbackground;
    public $textbutton;
    public $backgroundbutton;
    public $backgroundscrollBar;
    public $datatime;

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
        $this->data = date('d.m.y', strtotime($this->datacard));
        $this->datatime = date('H:i:s', strtotime($this->datacard));
        $this->textforEdit = $this->text;
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
        //Выгружать в моунт саму карточку, брать от туда стили (присваивать), брать от туда id стиля
        $this->backgroundscrollBar = sscanf($this->textbutton, "#%02x%02x%02x");
    }


    //сделать валидацию на объём сымволов и другое

    public function update()
    {
        Card::find($this->idCard)->update([
            'text' => $this->text,
            'source' => $this->source,
            'tag_id' => $this->selectedTagforcard,
            'style_card_id' => $this->lastcardstyle,
        ]);
    }

    public function removecards()
    {
        $this->emitUp('deletecard', $this->idCard);
    }

    // public function resetcolor()
    // {
    //     $this->colorchengfirst($this->allstyles->find($this->lastcardstyle)->background,$this->allstyles->find($this->lastcardstyle)->text);
    //     $this->colorcheng($this->background,$this->textbackground);
    // }

    // public function leftchengcolor()
    // {
    //     $this->lastcardstyle--;
    //     $this->lastcardstyle == 0 ? $this->lastcardstyle = $this->countstyles : '';
    //     $this->resetcolor();
    // }

    // public function rightchengcolor()
    // {
    //     $this->lastcardstyle == $this->countstyles ? $this->lastcardstyle = 1 : $this->lastcardstyle++;
    //     $this->resetcolor();
    // }

    // public function colorcheng($background = '#3C3B3D', $textbackground = '#ffffff')
    // {
    //     $this->backgroundbutton = $background;
    //     $this->textbutton = $textbackground;
    // }

    public function click_preview()
    {
        $this->update();
        $this->component_edit_text = 'cards.cardsMinimalPreview';
    }

    public function click_edit()
    {
        $this->component_edit_text = 'cards.cardsMinimalEdit';
        $this->backgroundbutton = $this->textbackground;
        $this->textbutton = $this->background;
    }

    public function click_chow()
    {
        $this->update();
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
        $this->component_edit_text = 'cards.cardsMinimalShow';
    }

    public function click_edit_cource()
    {
        $this->update();
        $this->component_edit_text = 'cards.cardsMinimalEditSource';
    }

    public function render()
    {
        return view('livewire.cards');
    }
}
