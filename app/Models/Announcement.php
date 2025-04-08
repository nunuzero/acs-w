<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'content',
    ];
}
