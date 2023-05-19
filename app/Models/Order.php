<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'cart_id',
        'user_id',
        'order_array',
        'official_name',
        'location',
        'phone_number',
        'delivery_fee',
        'total',
        'pay_status',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
