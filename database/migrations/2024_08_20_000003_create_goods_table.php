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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('price')->nullable();
            $table->bigInteger('gross_weight')->nullable();
            $table->string('gross_weight_unit')->nullable();
            $table->bigInteger('nett_weight')->nullable();
            $table->string('nett_weight_unit')->nullable();
            $table->foreignId('goods_category_id')->nullable();
            $table->string('image')->nullable();
            $table->string('packaging_image')->nullable();
            $table->string('brand')->nullable();
            $table->float('total_stock')->nullable();
            $table->boolean('is_for_sale')->default(true);
            $table->boolean('is_imported')->default(false);
            $table->string('import_placement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
