<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Option;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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
            Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),

            Select::make('allergens')
                ->multiple()
                ->preload()
                ->relationship('allergens', 'name'),

            TextInput::make('name')->required(),

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
                    ->orderColumn('position')
                    ->columnSpanFull(),

            // Select::make('option_group_id')
            //     ->relationship('optionGroup', 'name')
            //     ->live()
            //     ->afterStateUpdated(function (Set $set, $state) {
            //         if ($state) {
            //             // Bei “Optionen-Preis” darf Artikelpreis nicht mitgespeichert werden.
            //             $set('price', null);
            //             // Option-Preiszeilen resetten bei Wechsel der Gruppe:
            //             $set('articleOptions', []);
            //         }
            //     }),

            // Artikelpreis NUR wenn KEINE OptionGroup gewählt ist
            TextInput::make('price')
                ->label('Preis')
                ->numeric()
                ->step('0.01')
                ->prefix('€')
                ->nullable(),

            Textarea::make('description')->columnSpanFull(),

            FileUpload::make('image_path')
                ->image()
                ->directory('articles')
                ->disk('public')
                ->visibility('public')
                ->imageEditor(),

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
