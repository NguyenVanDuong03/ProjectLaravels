<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('reviewid');
            $table->unsignedBigInteger('bookid');
            $table->integer('rating');
            $table->text('reviewText');
            $table->dateTime('reviewDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('bookid')->references('bookid')->on('books')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
