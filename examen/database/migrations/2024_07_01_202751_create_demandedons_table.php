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
        Schema::create('demandedons', function (Blueprint $table) {
            $table->id();
            $table->string('nomdemandeur');
            $table->string('lieu');
            $table->string('statut');
            $table->string('nbdonneurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandedons');
    }
};
