<?php

namespace App\Filament\Resources\Allergens\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AllergenInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('emoji'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
