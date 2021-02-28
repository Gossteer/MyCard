<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryCards extends Component
{
    public $allstyles;
    public $selectTags;
    public $cards;
    public $open_category, $keytag;

    protected $listeners = ['click_open_category'];

    public function render()
    {
        return view('livewire.category-cards');
    }

    public function mount()
    {
        $this->open_category = false;
    }

    public function click_open_category()
    {
        $this->open_category = !$this->open_category;
    }
}
