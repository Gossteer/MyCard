<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StyleCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'background',
        'text',
    ];

    protected $table = 'style_cards';

    public function card()
    {
        return $this->hasMany('App\Models\Card', 'style_card_id');
    }
}
