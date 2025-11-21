<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // montant demandé en Ariary
            $table->unsignedBigInteger('amount');

            // statut: pending, approved, rejected, cancelled
            $table->string('status')->default('pending');

            // moyen de payement (ex: mobile money, virement), champs libre
            $table->string('method')->nullable();

            // informations de paiement (num compte, telephone) - stocker json ou text
            $table->text('method_details')->nullable();

            // optionnel : admin note
            $table->text('admin_note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
