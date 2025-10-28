<?php

namespace App\Filament\Resources\Articleoptions\Pages;

use App\Filament\Resources\Articleoptions\ArticleoptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArticleoptions extends ListRecords
{
    protected static string $resource = ArticleoptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
