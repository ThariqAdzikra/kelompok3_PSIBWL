<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->id('id_garansi');
            $table->foreignId('id_transaksi')->references('id_transaksi')->on('transactions')->onDelete('cascade');
            $table->foreignId('id_produk')->references('id_produk')->on('products')->onDelete('cascade');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->enum('status', ['aktif', 'kadaluarsa'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warranties');
    }
};