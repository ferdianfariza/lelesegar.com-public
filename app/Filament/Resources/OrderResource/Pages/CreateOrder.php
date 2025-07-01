<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Models\Log;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
    protected function afterCreate(): void
    {
        $order = $this->record;
        $customer = $order->customer;

        Log::create([
            'customer_id'       => $customer->id,
            'customer_name'     => $customer->name,
            'customer_whatsapp' => $customer->whatsapp,
            'customer_address'  => $customer->address,
            'order_id'          => $order->id,
            'quantity_kg'       => $order->quantity_kg,
            'order_date'        => $order->order_date,
            'fish_per_kg'       => $order->fish_per_kg,
            'notes'             => $order->notes,
        ]);
    }
    protected function afterSave(): void
    {
        $order = $this->record;
        $customer = $order->customer;

        Log::create([
            'customer_id'       => $customer->id,
            'customer_name'     => $customer->name,
            'customer_whatsapp' => $customer->whatsapp,
            'customer_address'  => $customer->address,
            'order_id'          => $order->id,
            'quantity_kg'       => $order->quantity_kg,
            'order_date'        => $order->order_date,
            'fish_per_kg'       => $order->fish_per_kg,
            'notes'             => $order->notes,
        ]);
    }
}
