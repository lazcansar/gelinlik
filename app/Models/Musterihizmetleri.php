<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musterihizmetleri extends Model
{
    use HasFactory;

    protected $table = "musterihizmetleris";
    protected $fillable = ["title", "url", "content", "created_at", "updated_at"];
}
