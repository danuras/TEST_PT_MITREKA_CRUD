<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_book')->index();
            $table->unsignedBigInteger('id_borrower');
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->foreign('id_book')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_borrower')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
