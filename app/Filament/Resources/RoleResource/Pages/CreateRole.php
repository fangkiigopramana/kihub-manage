<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function getRedirectUrl(): string
    {
        // Ganti '/custom-url' dengan URL yang ingin dituju setelah create
        return $this->getResource()::getUrl('index'); // Redirect ke halaman index resource
    }
}
