<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded = [];
    
    protected $dates = [
        'start_at',
        'end_at'
    ];

    public function book()
    {
        return $this->hasOne('\App\Book');
    }

    public function user()
    {
        return $this->belongTo('\App\User');
    }
}
