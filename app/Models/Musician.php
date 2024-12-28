<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    protected $fillable = [
        'user_id', 
        'name', 
        'genre', 
        'location', 
        'bio', 
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
