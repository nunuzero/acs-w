<?php

namespace App\Filament\Resources\QuestionnaireResource\Pages;

use App\Filament\Resources\QuestionnaireResource;
use App\Helper\RedirectToListPage;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuestionnaire extends CreateRecord
{
    use RedirectToListPage;

    protected static string $resource = QuestionnaireResource::class;
}
