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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_order_id')->constrained('vendor_orders');
            $table->foreignId('order_id')->constrained('vendor_orders');
            $table->foreignId('product_detail_id')->constrained('product_details');
            $table->integer('quantaty');
            $table->string('price');
            $table->enum('status', ['unaccept','panding','paid','shipping','deliverd','cancelled'])->default('panding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
