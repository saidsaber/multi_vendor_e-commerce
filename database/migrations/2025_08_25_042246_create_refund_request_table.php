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
        Schema::create('refund_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');     // المستخدم اللي قدم طلب الإرجاع
            $table->unsignedBigInteger('order_id');    // الطلب المرتبط
            $table->unsignedBigInteger('product_detail_id');  // المنتج اللي هيرجع
            $table->string('reason');                  // سبب الإرجاع
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund_request');
    }
};
