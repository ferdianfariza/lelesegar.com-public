<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'quantity_kg',
        'order_date',
        'fish_per_kg',
        'notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
