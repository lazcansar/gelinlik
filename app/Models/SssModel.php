<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SssModel extends Model
{
    use HasFactory;
    protected $table = "sss";
    protected $fillable = ["title", "content", "created_at", "updated_at"];
}
