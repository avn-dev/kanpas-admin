<?php

namespace App\Filament\Resources\OptionGroups\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OptionGroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Repeater::make('options')
                    // ->label('Optionen')
                    ->relationship('options')
                    ->defaultItems(0)
                    // ->collapsible()
                    // ->addActionLabel('Option hinzufügen')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                    ])
                    ->orderColumn('position')
                    ->columnSpanFull()
            ]);
    }
}
