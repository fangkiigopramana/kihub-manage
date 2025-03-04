<?php

namespace App\Filament\Widgets;

use InfinityXTech\FilamentWorldMapWidget\Enums\Map;
use InfinityXTech\FilamentWorldMapWidget\Widgets\WorldMapWidget;

class MapWidget extends WorldMapWidget
{
    protected int | string | array $columnSpan = 3;
    /**
     * Defines the map type to be displayed.
     *
     * @return Map|string The map type, defaults to the WORLD map.
     */
    public function map(): Map|string
    {
        return Map::WORLD_MERC; // Enum value for the world map
    }
    /**
     * Specifies the height of the widget container.
     *
     * @return string The height value in CSS-compatible format.
     */
    public function height(): string
    {
        return '600px'; // Default widget height
    }


    public function stats(): array
    {
        return [
            'US' => 35000,
            'RS' => 15000,
            'ID' => 40000,
            'AD' => 1200,
            'AO' => 32000,
            'AR' => 45000,
            'AM' => 7000,
            'AU' => 39000,
            'AT' => 8900,
            'AZ' => 10000,
            'BS' => 5000,
            'BH' => 4200,
            'BD' => 60000,
            'BY' => 9200,
            'BE' => 11500,
            'BT' => 780,
            'BO' => 11000,
            'BA' => 3500,
            'BW' => 2500,
            'BR' => 75000,
            'BN' => 600,
            'BG' => 7000,
            'BF' => 21000,
            'BI' => 13000,
            'CV' => 1200,
            'CM' => 25000,
            'CA' => 38000,
            'CF' => 4800,
            'TD' => 16000,
            'CL' => 19000,
            'CN' => 140000,
            'CO' => 32000,
            'CD' => 56000,
            'CG' => 5500,
            'CR' => 5100,
            'HR' => 3800,
            'CY' => 1200,
            'CZ' => 10800,
            'CI' => 27000,
            'DK' => 5800,
            'DJ' => 1200,
            'DO' => 11000,
            'EC' => 17000,
            'EG' => 104000,
            'SV' => 6500,
            'EE' => 1300,
            'ET' => 117000,
            'FO' => 50,
            'FI' => 5500,
            'FR' => 67000,
            'GE' => 3900,
            'DE' => 83000,
            'GT' => 18000,
            'GN' => 13000,
            'HT' => 11000,
            'HN' => 10000,
            'HK' => 7500,
            'HU' => 9600,
            'IN' => 138000,
            'IR' => 84000,
            'IQ' => 41000,
            'IE' => 5000,
            'IL' => 9300,
            'IT' => 60000,
            'JP' => 126000,
            'KZ' => 18700,
            'KE' => 53700,
            'KR' => 51700,
            'XK' => 1800,
            'KG' => 6500,
            'LA' => 7200,
            'LV' => 1900,
            'LT' => 2700,
            'LU' => 640,
            'MY' => 33000,
            'ML' => 20200,
            'MT' => 520,
            'MX' => 126000,
            'MD' => 2600,
            'ME' => 620,
            'MA' => 37000,
            'MZ' => 31200,
            'MM' => 54000,
            'NA' => 2500,
            'NP' => 29100,
            'NL' => 17200,
            'NZ' => 5100,
            'NI' => 6600,
            'NG' => 206000,
            'NO' => 5400,
            'OM' => 5100,
            'PK' => 220000,
            'PS' => 5000,
            'PA' => 4300,
            'PY' => 7100,
            'PE' => 33000,
            'PH' => 109000,
            'PL' => 38000,
            'PT' => 10200,
            'QA' => 2900,
            'RO' => 19000,
            'RU' => 146000,
            'RW' => 13000,
            'SM' => 34,
            'SA' => 35000,
            'RS' => 6900,
            'SG' => 5800,
            'SK' => 5400,
            'SI' => 2100,
            'ZA' => 59000,
            'ES' => 47000,
            'LK' => 21000,
            'SD' => 43800,
            'SE' => 10300,
            'CH' => 8600,
            'SY' => 17000,
            'TW' => 23800,
            'TJ' => 9500,
            'TH' => 70000,
            'TR' => 84000,
            'UG' => 45000,
            'UA' => 41000,
            'AE' => 9800,
            'GB' => 67000,
            'US' => 331000,
            'UY' => 3500,
            'UZ' => 33500,
            'VN' => 97000,
            'YE' => 29800,
            'ZM' => 19000,
            'ZW' => 14800,
        ];        
    }
}
