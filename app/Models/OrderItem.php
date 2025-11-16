<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_name',
        'menu_image',
        'menu_price',
        'quantity',
        'subtotal'
    ];

    protected $casts = [
        'menu_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format((float)$this->menu_price, 0, ',', '.');
    }

    public function getFormattedSubtotalAttribute()
    {
        return 'Rp ' . number_format((float)$this->subtotal, 0, ',', '.');
    }
}