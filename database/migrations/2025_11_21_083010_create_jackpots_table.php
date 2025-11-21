<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jackpots', function (Blueprint $table) {
        $table->id();
        $table->date('date_debut');
        $table->date('date_fin');
        $table->bigInteger('somme');
        $table->enum('status', ['A planifier', 'Lancer', 'Terminer'])->default('A planifier');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('jackpots');
}

};
