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
        Schema::create('customer_registrations', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("slug")->nullable();
            $table->string("email")->nullable();
            $table->string("phonenumber")->nullable();
            $table->string("address")->nullable();
            $table->string("password")->nullable();
            $table->string("google_id")->nullable();
            $table->integer("otp")->nullable();
            $table->integer("membercode")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_registrations');
    }
};
