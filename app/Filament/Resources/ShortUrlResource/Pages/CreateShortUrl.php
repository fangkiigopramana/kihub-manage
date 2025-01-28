<?php

namespace App\Filament\Resources\ShortUrlResource\Pages;

use App\Filament\Resources\ShortUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use AshAllenDesign\ShortURL\Classes\Builder;


class CreateShortUrl extends CreateRecord
{
    protected static string $resource = ShortUrlResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $shortURLObject = app(Builder::class)
            ->destinationUrl('https://destination.com')
            ->urlKey('custom-key')
            ->make();

        $shortURL = $shortURLObject->default_short_url;
        return $data;
    }
}
