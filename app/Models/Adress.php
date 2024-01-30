<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'adresses';
    protected $fillable = [
        'adress_type',
        'adress_phone',
        'adress_long',
        'adress_in_city',
        'adress_city',
        'adress_country',
        'user_id',
        'created_at',
        'updated_at'
    ];

}
