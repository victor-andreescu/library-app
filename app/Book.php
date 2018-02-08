<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'description',
        'cover_image',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo('\App\Author');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag');
    }
}
