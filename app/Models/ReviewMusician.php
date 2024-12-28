<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewMusician extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'genre',
    ];

    /**
     * Relasi: Musician dimiliki oleh seorang user (akun musisi).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Musician memiliki banyak review.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'musician_id');
    }

    /**
     * Relasi: Musician memiliki banyak performance (tampil di berbagai cafe).
     */
    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}
