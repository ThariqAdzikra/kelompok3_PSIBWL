<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('google_id')->unique();
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('foto_profil')->nullable();
            $table->enum('role', ['admin', 'customer']);
            $table->timestamp('tanggal_daftar')->useCurrent();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
