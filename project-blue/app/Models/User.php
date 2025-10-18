<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Hash the password automatically when setting it.
     */
    public function setPasswordAttribute($value)
    {
        if ($value === null) {
            return;
        }

        // If the value is already hashed, don't re-hash it.
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }
}