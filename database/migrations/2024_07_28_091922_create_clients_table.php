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
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('first_name', 100);
        $table->string('last_name', 100)->nullable();
        $table->enum('client_type',['individual','agency']);
        $table->string('email', 255)->unique();
        $table->string('whatsapp_no', 15)->unique();
        $table->string('city', 100);
        $table->string('address', 255);
        $table->string('bank_name', 100);
        $table->string('branch_code', 20)->nullable();
        $table->string('store_name', 100);
        $table->string('account_title', 100);
        $table->string('iban_number', 40);
        $table->boolean('verified')->default(0);
        $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
        $table->softDeletes();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
