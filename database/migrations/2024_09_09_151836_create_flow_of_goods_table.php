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
        Schema::create('flow_of_goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goods_id')->constrained('goods')->onDelete('cascade');
            $table->boolean('is_asset')->default(false);
            $table->foreignId('goods_flow_type_id');
            $table->foreignId('base_placement_id')->nullable();
            $table->foreignId('destination_placement_id')->nullable();
            $table->boolean('is_return')->default(false);
            $table->foreignId('outbound_type_id')->nullable();
            $table->dateTime('return_date')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->string('operator_name')->nullable();
            $table->boolean('is_hanging')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flow_of_goods');
    }
};
