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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name")->nullable();
            $table->string("slug")->nullable();
            $table->string("discount_amount")->nullable();
            $table->string("featured_image")->nullable();
            $table->integer("brand")->nullable();
            $table->integer("featured")->nullable();
            $table->integer("slider")->nullable();
            $table->integer("product_order")->nullable();
            $table->integer("product_price")->nullable();
            $table->integer("cutoff_price")->nullable();
            $table->integer("category_id")->nullable();
            $table->longText("description")->nullable();
            $table->integer("mrp_price")->nullable();
            $table->longText("video")->nullable();
            $table->integer("product_stock")->nullable();
            $table->string("tax_type")->nullable();
            $table->double("tax_percentage")->nullable();
            $table->integer("total_sale")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
