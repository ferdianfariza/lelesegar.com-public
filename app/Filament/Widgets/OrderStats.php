<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget;
use App\Models\Order;

class OrderStats extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Total Order', Order::count()),
            Stat::make('Total Kg', Order::sum('quantity_kg') . ' kg'),
            Stat::make('Customer Unik', Order::distinct('customer_id')->count() . ' orang'),
        ];
    }
}
