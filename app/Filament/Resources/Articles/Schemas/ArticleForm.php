<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Option;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('number')
                ->numeric(),
            Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),

            TextInput::make('name')
                ->required(),

            RichEditor::make('description')
                ->columnSpanFull(),

            Select::make('allergens')
                ->relationship('allergens', 'name')
                ->multiple()
                ->preload(),

            Select::make('additives')
                ->relationship('additives', 'name')
                ->multiple()
                ->preload(),

            // Artikelpreis NUR wenn KEINE OptionGroup gewählt ist
            TextInput::make('price')
                ->label('Preis')
                ->numeric()
                ->step('0.01')
                ->prefix('€')
                ->nullable(),

            Repeater::make('options')
                ->relationship('options')
                ->defaultItems(0)
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required(),
                    TextInput::make('price')
                        ->label('Preis')
                        ->numeric()
                        ->step('0.01')
                        ->prefix('€')
                        ->nullable(),
                ])
                ->columnSpanFull(),

            // FileUpload::make('image_path')
            //     ->image()
            //     ->directory('articles')
            //     ->disk('public')
            //     ->visibility('public')
            //     ->imageEditor(),

            // Preise pro Option (kein Aufpreis, sondern der volle Preis der Variante)
            // Repeater::make('articleOptions')
            //     ->relationship('articleOptions')
            //     ->label('Varianten & Preise')
            //     ->visible(fn (Get $get) => filled($get('option_group_id')))
            //     ->defaultItems(0)
            //     ->schema([
            //         Select::make('option_id')
            //             ->label('Variante')
            //             ->searchable()
            //             ->preload()
            //             ->options(fn (Get $get) => $get('option_group_id')
            //                 ? Option::query()
            //                     ->where('option_group_id', $get('option_group_id'))
            //                     ->orderBy('name')
            //                     ->pluck('name', 'id')
            //                     ->all()
            //                 : []
            //             )
            //             ->required()
            //             ->live(),

            //         TextInput::make('price')
            //             ->label('Preis')
            //             ->numeric()
            //             ->step('0.01')
            //             ->prefix('€')
            //             ->required(),
            //     ])
            //     ->columns(2)
            //     ->columnSpanFull(),
        ]);
    }
}
