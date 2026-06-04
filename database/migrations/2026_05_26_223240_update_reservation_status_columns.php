<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {

            /**
             * Supprimer ancien status
             */
            $table->dropColumn('status');

            /**
             * Status admin
             */
            $table->enum('status_admin', [

                'en_attente',
                'validee',
                'affectee',
                'annulee'

            ])->default('en_attente');

            /**
             * Status artisan
             */
            $table->enum('status_artisan', [

                'en_attente',
                'acceptee',
                'en_cours',
                'terminee',
                'refusee'

            ])->default('en_attente');

        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {

            $table->dropColumn('status_admin');

            $table->dropColumn('status_artisan');

            $table->enum('status', [

                'en_attente',
                'validee',
                'refusee',
                'en_cours',
                'terminee',
                'annulee'

            ])->default('en_attente');

        });
    }
};