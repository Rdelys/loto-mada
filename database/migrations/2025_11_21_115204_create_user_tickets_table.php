<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_tickets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // 5 numéros
            $table->json('numbers');

            // numéro bonus
            $table->integer('bonus');

            // Catégorie attribuée automatiquement
            $table->integer('categorie')->nullable();

            // Status: Jouer, Gagner, Perdu
            $table->enum('status', ['Jouer', 'Gagner', 'Perdu'])->default('Jouer');

            // Jackpot lié (optionnel)
            $table->foreignId('jackpot_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_tickets');
    }
};
