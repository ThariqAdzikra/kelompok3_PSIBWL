<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id('id_po');
            $table->foreignId('id_supplier')->references('id_supplier')->on('suppliers')->onDelete('cascade');
            $table->dateTime('tanggal_pembelian');
            $table->decimal('total_biaya', 15, 2);
            $table->enum('status', ['pending', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};