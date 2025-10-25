<?php

namespace App\Filament\Resources\Allergens;

use App\Filament\Resources\Allergens\Pages\CreateAllergen;
use App\Filament\Resources\Allergens\Pages\EditAllergen;
use App\Filament\Resources\Allergens\Pages\ListAllergens;
use App\Filament\Resources\Allergens\Pages\ViewAllergen;
use App\Filament\Resources\Allergens\Schemas\AllergenForm;
use App\Filament\Resources\Allergens\Schemas\AllergenInfolist;
use App\Filament\Resources\Allergens\Tables\AllergensTable;
use App\Models\Allergen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AllergenResource extends Resource
{
    protected static ?string $model = Allergen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AllergenForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AllergenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AllergensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAllergens::route('/'),
            'create' => CreateAllergen::route('/create'),
            'edit' => EditAllergen::route('/{record}/edit'),
        ];
    }
}
