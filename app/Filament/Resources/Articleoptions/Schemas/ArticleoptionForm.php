<?php

namespace App\Filament\Resources\Articleoptions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ArticleoptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('article_id')
                    ->relationship('article', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('price')
                    ->label('Preis')
                    ->numeric()
                    ->step('0.01')
                    ->prefix('€')
                    ->nullable(),
                TextInput::make('position')
                    ->numeric(),
            ]);
    }
}
