<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MainHome extends Component
{
    public $cards;
    public $endcard;

    public function mount()
    {
        $this->cards = Card::where('user_id', Auth::user()->id)->get();
        $this->endcard = $this->cards->last();
    }

    public function render()
    {
        return view('livewire.main-home');
    }
}
