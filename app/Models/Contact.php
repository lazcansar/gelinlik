<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Contact extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $primaryKey = "id";
    protected $fillable = ["phone","mail","adress","google_maps","facebook","instagram","twitter","linkedin","tiktok","youtube","created_at","updated_at"];
}
