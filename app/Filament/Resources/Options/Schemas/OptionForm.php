<?php

namespace App\Filament\Resources\Options\Schemas;

use App\Filament\Resources\OptionGroups\RelationManagers\OptionsRelationManager;
use App\Filament\Resources\Options\OptionResource;
use App\Filament\Resources\Options\Pages\CreateOption;
use App\Filament\Resources\Options\Pages\EditOption;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('option_group_id')
                    ->relationship('optionGroup', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
