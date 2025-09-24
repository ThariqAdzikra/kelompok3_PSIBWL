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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('model');
            $table->string('cpu');
            $table->string('gpu')->nullable();
            $table->unsignedSmallInteger('ram_gb');
            $table->unsignedSmallInteger('storage_gb');
            $table->enum('storage_type', ['SSD', 'HDD'])->default('SSD');
            $table->decimal('screen_size', 4, 1);
            $table->string('resolution')->nullable();
            $table->decimal('price', 12, 2);
            $table->string('os')->nullable();
            $table->integer('stock')->default(0);
            $table->string('image_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['brand_id', 'model']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
