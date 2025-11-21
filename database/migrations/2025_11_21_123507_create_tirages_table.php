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
       Schema::create('tirages', function (Blueprint $table) {
            $table->id();
            $table->json('numbers');
            $table->integer('bonus');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->unsignedBigInteger('jackpot_id')->nullable();
            $table->integer('jackpot_somme')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tirages');
    }
};
