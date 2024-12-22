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
        'time',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function applications()
{
    return $this->hasMany(ApplyJob::class, 'job_id');
}

}
