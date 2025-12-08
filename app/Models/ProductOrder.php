<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';
    
    protected $fillable = [
        'product_id',
        'user_id',
        'full_name',
        'phone_number',
        'address',
        'quantity',
        'notes',
        'total_price',
        'status',
        'payment_id',
        'payment_status',
        'payment_url',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
