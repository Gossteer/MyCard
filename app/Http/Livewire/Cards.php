<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class Cards extends Component
{
    public $text;
    public $textforEdit;
    public $data;
    public $idCard;
    public $tag;
    public $component_edit_text = 'cards.cardsMinimalShow';
    public $source;
    public $click = 'click_edit';
    public $background;
    public $textbackground;
    public $textbutton;
    public $backgroundbutton;

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

    //сделать валидацию на объём сымволов и другое

    public function update()
    {
        Card::find($this->idCard)->update([
            'text' => $this->text
        ]);
    }

    public function mount()
    {
        $this->textforEdit = $this->text;
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
    }

    public function click_edit()
    {
        $this->backgroundbutton = $this->textbackground;
        $this->textbutton = $this->background;
        $this->component_edit_text = 'cards.cardsMinimalEdit';
        $this->click = 'click_chow';
    }

    public function click_chow()
    {
        $this->update();
        $this->backgroundbutton = $this->background;
        $this->textbutton = $this->textbackground;
        $this->component_edit_text = 'cards.cardsMinimalShow';
        $this->click = 'click_edit';
    }



    public function render()
    {
        return view('livewire.cards');
    }
}
