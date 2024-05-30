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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('id_orderitems');
            $table->unsignedBigInteger('id_orderlist');
            $table->unsignedBigInteger('id_item');
            $table->string('type_item');
            $table->integer('quantity');
            $table->decimal('price', 15, 2);
            $table->foreign('id_orderlist')->references('id_orderlist')->on('order_list')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
