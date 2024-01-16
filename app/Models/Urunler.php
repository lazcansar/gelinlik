<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urunler extends Model
{
    use HasFactory;

    public function kategori() {
        return $this->belongsTo(Category::class, 'categoryId', 'productId');
    }
}
