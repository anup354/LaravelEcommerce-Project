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
            $table->string("order_id")->nullable();
            $table->integer("user_id")->nullable();
            $table->integer("items")->nullable();
            $table->string("amount")->nullable();
            $table->string("payment_method")->nullable();
            $table->string("order_status")->nullable();
            $table->string("payment_status")->nullable();
            $table->integer("view_status")->nullable();
            $table->string("order_from")->nullable();
            $table->float("delivery_charge")->nullable();
            $table->double("taxpercent")->nullable();
            $table->double("taxamount")->nullable();
            $table->string("coupon")->nullable();
            $table->double("coupondiscount")->nullable();
            $table->timestamp("delivered_date")->nullable();
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
