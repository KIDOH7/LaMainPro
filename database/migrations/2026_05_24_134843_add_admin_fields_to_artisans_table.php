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
        Schema::table('artisans', function (Blueprint $table) {

            /**
             * Validation admin
             */
            $table->boolean('is_verified')
                  ->default(false);

            /**
             * Premium
             */
            $table->boolean('is_premium')
                  ->default(false);

            /**
             * Suspension
             */
            $table->boolean('is_suspended')
                  ->default(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artisans', function (Blueprint $table) {

            $table->dropColumn([

                // 'is_verified',
                'is_premium',
                'is_suspended'

            ]);

        });
    }
};