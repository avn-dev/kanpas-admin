<?php

namespace App\Filament\Resources\Articleoptions;

use App\Filament\Resources\Articleoptions\Pages\CreateArticleoption;
use App\Filament\Resources\Articleoptions\Pages\EditArticleoption;
use App\Filament\Resources\Articleoptions\Pages\ListArticleoptions;
use App\Filament\Resources\Articleoptions\Schemas\ArticleoptionForm;
use App\Filament\Resources\Articleoptions\Tables\ArticleoptionsTable;
use App\Models\Articleoption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArticleoptionResource extends Resource
{
    protected static ?string $model = Articleoption::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ArticleoptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArticleoptionsTable::configure($table);
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
            'index' => ListArticleoptions::route('/'),
            'create' => CreateArticleoption::route('/create'),
            'edit' => EditArticleoption::route('/{record}/edit'),
        ];
    }
}
