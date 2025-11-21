<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // montant total gagné par l'utilisateur (en ariary) - integer pour ariary ou decimal si centimes
            $table->unsignedBigInteger('argent_gagnee')->default(0)->after('solde')->comment('Total des gains reçus');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('argent_gagnee');
        });
    }
};
