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
        Schema::create('reservations', function (Blueprint $table) {

            $table->id();

            /**
             * =========================
             * SECTEUR DEMANDÉ
             * =========================
             */
            $table->string('secteur');

            /**
             * =========================
             * INFORMATIONS CLIENT
             * =========================
             */
            $table->string('client_name');

            $table->string('client_phone');

             /**
             * =========================
             * LOCALISATION
             * =========================
             */
            $table->string('ville')
                  ->default('Abidjan');

            $table->string('commune');

            $table->string('quartier');

            /**
             * =========================
             * RÉSERVATION
             * =========================
             */
            $table->date('reservation_date');

            $table->text('description');

            /**
             * =========================
             * ARTISAN ASSIGNÉ PAR ADMIN
             * =========================
             */
            $table->foreignId('artisan_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            /**
             * =========================
             * PRIORITÉ
             * =========================
             */
            $table->enum(
                'priority',
                [
                    'normale',
                    'urgente'
                ]
            )->default('normale');

            /**
             * =========================
             * STATUT
             * =========================
             */
            $table->enum(
                'status',
                [
                    'en_attente',
                    'validee',
                    'refusee',
                    'en_cours',
                    'terminee',
                    'annulee'
                ]
            )->default('en_attente');

            /**
             * =========================
             * NOTES ADMIN
             * =========================
             */
            $table->text('admin_note')
                  ->nullable();

            /**
             * =========================
             * DATE D'ASSIGNATION
             * =========================
             */
            $table->timestamp('assigned_at')
                  ->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};