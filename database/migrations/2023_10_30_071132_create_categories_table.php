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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("categoryname")->nullable();
            $table->string("slug")->nullable();
            $table->integer("category_id")->nullable();
            $table->integer("parent_id")->nullable();
            $table->integer("featured")->nullable();
            $table->integer("category_order")->nullable();
            $table->integer("in_menu")->nullable();
            $table->string("image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
