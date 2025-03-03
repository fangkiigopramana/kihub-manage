<?php

namespace App\Filament\Resources\GenerateTextResource\Pages;

use App\Filament\Resources\GenerateTextResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGenerateText extends EditRecord
{
    protected static string $resource = GenerateTextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
