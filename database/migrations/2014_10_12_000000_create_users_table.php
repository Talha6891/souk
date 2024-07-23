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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('whatsapp_no', 15)->unique();
            $table->string('city', 100);
            $table->string('address', 255);
            $table->string('bank_name', 100);
            $table->string('branch_code', 20);
            $table->string('store_name', 100);
            $table->string('account_title', 100);
            $table->string('iban_number', 40);
            $table->string('referral_code', 50)->nullable();
            $table->boolean('verified')->default(0);
            $table->rememberToken();
            $table->string('profile_photo_path', 5120)->nullable();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
