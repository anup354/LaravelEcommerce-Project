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
        Schema::create('customerdeliveryaddresses', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable();
            $table->string("delivery_name")->nullable();
            $table->string("delivery_email")->nullable();
            $table->string("delivery_phonenumber")->nullable();
            $table->string("delivery_address")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customerdeliveryaddresses');
    }
};
