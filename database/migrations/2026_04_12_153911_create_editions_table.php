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
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 13)->unique();
            $table->string('title', 100);
            //$table->string('language', 50);
            $table->date('publication_date');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->string('format');
            $table->text('synopsis');
            $table->string('cover')->nullable();
            //Foreign keys
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('editorial_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editions');
    }
};
