<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan username yang harus unik
            $table->string('username')->unique()->after('email');
            // Tambahkan password yang bisa null (karena awalnya dari google)
            $table->string('password')->nullable()->after('username');
            // Tambahkan remember token untuk fitur "Ingat Saya"
            $table->rememberToken()->after('last_login');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
        });
    }
};