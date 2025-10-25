<?php

namespace App\Filament\Resources\Options\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OptionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('optionGroup.name')
                    ->label('Option group'),
                TextEntry::make('name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
