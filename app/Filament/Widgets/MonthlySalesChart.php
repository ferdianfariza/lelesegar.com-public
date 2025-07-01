<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class MonthlySalesChart extends ChartWidget
{
    protected static ?string $heading = 'Penjualan per Bulan (kg)';
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // Ambil total quantity per bulan
        $sales = Order::selectRaw('MONTH(created_at) as month, SUM(quantity_kg) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = \Carbon\Carbon::create()->month($i)->format('F');
            $data[] = $sales->get($i, 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Penjualan (kg)',
                    'data' => $data,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.7)', // green-500
                    'borderRadius' => 5,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
