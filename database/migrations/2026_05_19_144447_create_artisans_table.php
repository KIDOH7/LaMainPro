<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('artisans', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    public function up(): void
{
    Schema::create('artisans', function (Blueprint $table) {

        $table->id();

        $table->string('fullname');

        $table->string('phone')->unique();

        $table->string('city')->default('Abidjan');

        $table->string('commune');

        $table->string('quartier');

        $table->string('secteur');

        $table->string('email')->nullable();

        $table->text('description')->nullable();

        $table->string('id_card_front');

        $table->string('id_card_back');

        $table->string('profile_photo');

        $table->string('password');

        $table->boolean('is_verified')->default(false);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artisans');
    }
};
