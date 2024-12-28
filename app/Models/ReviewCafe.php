<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewCafe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'description',
    ];

    /**
     * Relasi: Cafe dimiliki oleh seorang user (pemilik cafe).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Cafe memiliki banyak review.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'cafe_id');
    }

    /**
     * Relasi: Cafe memiliki banyak performance (musisi yang pernah tampil di cafe ini).
     */
    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}
