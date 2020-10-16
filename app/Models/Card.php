<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function stylecard()
    {
        return $this->belongsTo('App\Models\StyleCard');
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
