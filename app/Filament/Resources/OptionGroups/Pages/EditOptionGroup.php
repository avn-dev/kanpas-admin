<?php

namespace App\Filament\Resources\OptionGroups\Pages;

use App\Filament\Resources\OptionGroups\OptionGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOptionGroup extends EditRecord
{
    protected static string $resource = OptionGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
