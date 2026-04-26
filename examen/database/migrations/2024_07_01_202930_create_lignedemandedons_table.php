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
        Schema::create('lignedemandedons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centrehospitalier_id');
            $table->foreignId('demandedon_id');
            $table->date('datedemande');
            $table->time('heuredemande');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lignedemandedons');
    }
};
