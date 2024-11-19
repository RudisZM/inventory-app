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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goods_id')->constrained('goods')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('place_id');
            $table->foreignId('area_id')->nullable();
            $table->foreignId('rak_id')->nullable();
            $table->foreignId('shap_id')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
