<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cafe_id',
        'musician_id',
        'rating',
        'deskripsi',
    ];

    /**
     * Relasi: Review dibuat oleh seorang user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Review terkait dengan sebuah cafe (jika review dibuat untuk cafe).
     */
    public function cafe()
    {
        return $this->belongsTo(ReviewCafe::class, 'cafe_id');
    }

    /**
     * Relasi: Review terkait dengan seorang musisi (jika review dibuat untuk musisi).
     */
    public function musician()
    {
        return $this->belongsTo(ReviewMusician::class, 'musician_id');
    }

}
