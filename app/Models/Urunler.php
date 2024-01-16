<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urunler extends Model
{
    use HasFactory;
    protected $table = "urunlers";
    protected $primaryKey = "productId";
    protected $fillable = ["productId",	"productTitle",	"productPrice",	"productContent",	"productInfo",	"productStock",	"productUrl",	"productCoverImage",	"productImageGallery",	"categoryId",	"created_at",	"updated_at"];

    public function kategori() {
        return $this->belongsTo(Category::class, 'categoryId', 'productId');
    }
}
