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
        Schema::create('edition_order', function (Blueprint $table) {
            //FK de las dos tablas
            $table->unsignedBigInteger('edition_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('quantity');
            $table->decimal('unitary_price', 10, 2);
            $table->timestamps();
            $table->primary(['order_id', 'edition_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edition_order');
    }
};
