<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'service',
        'full_name',
        'phone_number',
        'address',
        'date',
        'time',
        'notes',
        'status',
        'payment_id',
        'payment_status',
        'payment_url',
        'total_price',
        'payment_type',
        'dp_amount',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
