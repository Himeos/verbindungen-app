<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';
    protected $fillable = ['difficulty', 'used'];

    public function words()
    {
        return $this->belongsToMany(Word::class, 'card_has_words');
    }
}
