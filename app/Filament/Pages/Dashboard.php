<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\MapWidget;
use App\Filament\Widgets\SistemAntrian;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public static function getWidgets(): array
    {
        return [
            SistemAntrian::class, // Tambahkan widget sistem antrian
            // MapWidget::class, // Tambahkan widget peta
        ];
    }
}
