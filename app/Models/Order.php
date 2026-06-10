<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'total_price',
        'status',
        'notes',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
