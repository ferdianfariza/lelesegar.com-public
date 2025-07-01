<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_whatsapp',
        'customer_address',
        'order_id',
        'order_date',
        'quantity_kg',
        'fish_per_kg',
        'notes',
        'description',
    ];
}
