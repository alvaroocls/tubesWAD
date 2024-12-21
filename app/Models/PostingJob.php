<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostingJob extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'preferences',
        'date',
        'time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
