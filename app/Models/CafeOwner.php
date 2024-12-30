<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CafeOwner extends Model
{
    protected $fillable = [
        'user_id', 
        'name',  
        'location', 
        'bio', 
        'kapasitas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
