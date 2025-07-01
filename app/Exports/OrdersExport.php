<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::with('customer')->get()->map(function ($order) {
            return [
                'Nama' => $order->customer->name,
                'WA' => $order->customer->whatsapp,
                'Alamat' => $order->customer->address,
                'Jumlah (kg)' => $order->quantity_kg,
                'Ekor/Kg' => $order->fish_per_kg,
                'Catatan' => $order->notes,
                'Tanggal Pesan' => $order->order_date,
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama', 'WA', 'Alamat', 'Jumlah (kg)', 'Ekor/Kg', 'Catatan', 'Tanggal Pesan'];
    }
}
