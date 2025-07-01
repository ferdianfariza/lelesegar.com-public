<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Setting;
use Filament\Widgets\Widget;

class EstimasiPendapatanBersih extends Widget
{
    protected static string $view = 'filament.widgets.estimasi-pendapatan-bersih';
    protected int | string | array $columnSpan = 'full';

    public function getData(): array
    {
        $hargaJual = (int) Setting::where('key', 'harga_per_kg')->first()?->value ?? 26500;
        $hargaBeli = (int) Setting::where('key', 'harga_beli')->first()?->value ?? 15000;
        $totalKg = Order::sum('quantity_kg');

        return [
            'hargaJual' => $hargaJual,
            'hargaBeli' => $hargaBeli,
            'pendapatanBersih' => $totalKg * ($hargaJual - $hargaBeli),
        ];
    }
}
