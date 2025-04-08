<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionnaireResult extends Model
{
    protected $fillable = [
        'result',
        'smartphone_user_id',
    ];

    public function smartphoneUser(): BelongsTo
    {
        return $this->belongsTo(SmartphoneUser::class);
    }
}
