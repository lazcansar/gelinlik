<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['name',	'surname','identification','email','password', 'rol', 'created_at','updated_at'];
}
