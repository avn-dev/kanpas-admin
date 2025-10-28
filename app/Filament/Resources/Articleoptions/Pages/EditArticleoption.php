<?php

namespace App\Filament\Resources\Articleoptions\Pages;

use App\Filament\Resources\Articleoptions\ArticleoptionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditArticleoption extends EditRecord
{
    protected static string $resource = ArticleoptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
