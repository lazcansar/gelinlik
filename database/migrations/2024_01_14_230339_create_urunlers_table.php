<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('urunlers', function (Blueprint $table) {
            $table->id('productId');
            $table->string('productTitle'); // Ürün adı
            $table->string('productPrice'); // Ürün fiyat
            $table->longText('productContent'); // Ürün açıklama
            $table->longText('productInfo'); // Ürün ek bilgi
            $table->string('productStock'); // Ürün stock
            $table->string('productUrl'); // Ürün url
            $table->string('productCoverImage');
            $table->string('productImageGallery');
            $table->unsignedBigInteger('categoryId'); // Kategori Id - İlişkisel Bağlantı
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urunlers');
    }
};
