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

        if (!Schema::hasColumn('artisans', 'is_verified')) {

            $table->boolean('is_verified')->default(false);

            $table->boolean('is_premium')->default(false);
    
            $table->boolean('is_suspended')->default(false);
    
            $table->string('badge')->nullable();
        }


    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artisans', function (Blueprint $table) {
            //
        });
    }
};
