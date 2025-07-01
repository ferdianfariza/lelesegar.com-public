<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\Widget;

use App\Models\Setting;

class EstimasiPendapatan extends Widget
{
    protected static string $view = 'filament.widgets.estimasi-pendapatan';
    protected int | string | array $columnSpan = 'full';

    public function totalPendapatan(): string
    {
        $hargaPerKg = (int) Setting::where('key', 'harga_per_kg')->first()?->value ?? 26500;

        $totalKg = \App\Models\Order::sum('quantity_kg');
        $pendapatan = $totalKg * $hargaPerKg;

        return 'Rp ' . number_format($pendapatan, 0, ',', '.');
    }

    public function hargaPerKg(): string
    {
        $harga = (int) Setting::where('key', 'harga_per_kg')->first()?->value ?? 26500;
        return 'Rp ' . number_format($harga, 0, ',', '.');
    }
}
