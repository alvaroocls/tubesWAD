<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_id', 'message'];

    public function job()
    {
        // return $this->belongsTo(PostingJob::class);
        return $this->belongsTo(PostingJob::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
