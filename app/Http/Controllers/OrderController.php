<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function create()
    {
        return view('order.form');
    }

    public function store(Request $request)
    {
        // Validasi data form
        $data = $request->validate([
            'name' => ['required', 'min:3', 'regex:/[a-zA-Z\s]/', 'max:255'],
            'whatsapp' => ['required', 'regex:/^08[0-9]{8,15}$/'],
            'address' => ['required', 'string', 'min:10'],
            'quantity_kg' => ['required', 'numeric', 'min:1', 'max:500'],
            'fish_per_kg' => ['nullable', 'integer', 'min:1', 'max:100'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        // Simpan customer (atau ambil berdasarkan WhatsApp)
        $customer = Customer::firstOrCreate(
            ['whatsapp' => $data['whatsapp']],
            ['name' => $data['name'], 'address' => $data['address']]
        );

        // Simpan order
        $order = Order::create([
            'customer_id' => $customer->id,
            'quantity_kg' => $data['quantity_kg'],
            'fish_per_kg' => $data['fish_per_kg'],
            'notes' => $data['notes'],
            'order_date' => now(),
            // Tidak perlu lagi kode_unik karena menggunakan id
        ]);

        // Simpan log snapshot
        Log::create([
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
            'customer_whatsapp' => $customer->whatsapp,
            'customer_address' => $customer->address,
            'order_id' => $order->id,
            'order_date' => $order->order_date,
            'quantity_kg' => $order->quantity_kg,
            'fish_per_kg' => $order->fish_per_kg,
            'notes' => $order->notes,
        ]);

        // Redirect ke halaman terima kasih dengan id
        return redirect()->route('order.thanks', ['id' => $order->id]);
    }


    public function thanks($id)
    {
        // Cari order berdasarkan id
        $order = Order::findOrFail($id); // Gunakan findOrFail untuk mencari berdasarkan id

        // Ambil harga per kg dari setting (default jika tidak ada)
        $hargaPerKg = Setting::where('key', 'harga_per_kg')->value('value') ?? 26500;

        return view('order.thanks', compact('order', 'hargaPerKg'));
    }
}
