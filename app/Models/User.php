<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableModel;

class User extends AuthenticatableModel implements AuthenticatableContract
{

    use HasFactory, Authenticatable;

    protected $fillable = [
        'firstName',
        'lastName',
        'username',
        'password',
        'email',
        'role'
    ];

    public $timestamps = false;

    public function isMusician()
    {
        return $this->role === 'musician';
    }
    
    public function isCafeOwner()
    {
        return $this->role === 'cafeOwner';
    }

    public function postingJobs()
    {
        return $this->hasMany(PostingJob::class);
    }
    public function applications()
    {
    return $this->hasMany(ApplyJob::class);
    }
    public function musicianProfile()
    {
        return $this->hasOne(Musician::class);
    }

}
