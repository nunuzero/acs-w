<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmartphoneUser extends Model
{
    protected $fillable = [
        'name',
        'username',
        'address',
        'birth_date',
        'gender',
        'whatsapp_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
