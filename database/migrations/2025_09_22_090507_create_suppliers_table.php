<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('id_supplier');
            $table->string('nama_supplier');
            $table->string('kontak')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
