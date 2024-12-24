<?php

// app/Models/Word.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['word'];
    protected $table = 'word';
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'word_has_category');
    }
}
