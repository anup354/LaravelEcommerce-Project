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
        Schema::create('orderproductattributes', function (Blueprint $table) {
            $table->id();
            $table->integer("order_id")->nullable();
            $table->integer("order_item_id")->nullable();
            $table->integer("product_id")->nullable();
            $table->integer("attribute_group_id")->nullable();
            $table->integer("attribute_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderproductattributes');
    }
};
