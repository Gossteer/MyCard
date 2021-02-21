<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'source',
        'user_id',
        'tag_id',
        'style_card_id'
    ];

    public function stylecard()
    {
        return $this->belongsTo('App\Models\StyleCard', 'style_card_id');
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function setTextAttribute($value)
    {

        $this->attributes['text'] = Crypt::encrypt($value);

    }

    public function getTextAttribute($value)
    {
        if (is_null($value)) {

            return $value;

        }

        return Crypt::decrypt($value);
    }

    public function setSourceAttribute($value)
    {

        $this->attributes['source'] = Crypt::encrypt($value);

    }

    public function getSourceAttribute($value)
    {
        if (is_null($value)) {

            return $value;

        }

        return Crypt::decrypt($value);
    }
}
