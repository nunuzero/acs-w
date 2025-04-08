<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    protected $fillable = [
        'name',
        'light_risk_requirement',
        'medium_risk_requirement',
        'heavy_risk_requirement',
        'light_risk_response',
        'medium_risk_response',
        'heavy_risk_response',
        'unqualified_risk_response',
    ];

    public function contents(): HasMany
    {
        return $this->hasMany(QuestionnaireContent::class);
    }
}
