<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name',
        'job_id',
        'apply_date',
        'status'
    ];

    public function applyJob()
    {
        return $this->belongsTo(ApplyJob::class, 'job_id');
    }

    public function postingJob()
    {
        return $this->belongsTo(PostingJob::class, 'job_id');
    }

    
}
