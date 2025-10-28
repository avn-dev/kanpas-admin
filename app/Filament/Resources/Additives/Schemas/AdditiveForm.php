<?php

namespace App\Filament\Resources\Additives\Schemas;

namespace App\Filament\Resources\Allergens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdditiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('emoji')
                    ->label('Emoji oder Kürzel')
                    ->required(),
            ]);
    }
}
