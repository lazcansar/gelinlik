<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'country',
        'city',
        'adress',
        'postal_code',
        'message',
        'ship_method',
        'order_method',
        'total_price',
        'productId',
        'userId',
        'order_number',
        'created_at',
        'updated_at'
    ];
}
