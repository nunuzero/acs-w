<?php

namespace App\Filament\Resources\QuestionnaireResource\Pages;

use App\Filament\Resources\QuestionnaireResource;
use App\Helper\RedirectToListPage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuestionnaire extends EditRecord
{
    use RedirectToListPage;

    protected static string $resource = QuestionnaireResource::class;
}
