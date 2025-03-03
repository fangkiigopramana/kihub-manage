<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Widget;

class SistemAntrian extends Widget
{
    protected static string $view = 'filament.widgets.sistem-antrian';

    protected function getStats(): array
    {
        return [
            Stat::make('Unique views', '192.1k'),
            Stat::make('Bounce rate', '21%'),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
