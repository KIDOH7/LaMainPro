<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->id();

            /**
             * Artisan
             */
            $table->foreignId('artisan_id')
                ->constrained()
                ->onDelete('cascade');

            /**
             * Infos article
             */
            $table->string('title');

            $table->text('description')
                ->nullable();

            $table->decimal('price', 10, 2);

            /**
             * Images
             */
            $table->string('image1');

            $table->string('image2')
                ->nullable();

            $table->string('image3')
                ->nullable();

            $table->string('image4')
                ->nullable();

            /**
             * Disponibilité
             */
            $table->boolean('is_available')
                ->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};