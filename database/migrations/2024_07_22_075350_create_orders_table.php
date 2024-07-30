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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_name', 255);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('custom_order_id')->unique();
            $table->enum('status', ['pending','processing','delivered','cancelled','refunded','returned'])->default('pending');
            $table->string('customer_name', 255);
            $table->string('email', 255);
            $table->string('contact_no', 15);
            $table->string('city', 100);
            $table->text('shipping_address');
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2);
            $table->string('product_id')->nullable();
            // $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('warehouse_id')->nullable()->constrained('warehouses')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
