<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->id('id_detail_po');
            $table->foreignId('id_po')->references('id_po')->on('purchase_orders')->onDelete('cascade');
            $table->foreignId('id_produk')->references('id_produk')->on('products')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga_beli', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_order_details');
    }
};