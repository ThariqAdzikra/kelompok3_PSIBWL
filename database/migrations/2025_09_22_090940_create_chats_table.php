<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id('id_chat');
            $table->foreignId('id_user_pengirim')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreignId('id_user_penerima')->references('id_user')->on('users')->onDelete('cascade');
            $table->text('pesan');
            $table->boolean('dibaca')->default(false);
            $table->timestamp('timestamp')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};