<?php

// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['description'];
    protected $table = 'category';
    public function words()
    {
        return $this->belongsToMany(Word::class, 'word_has_category');
    }
}