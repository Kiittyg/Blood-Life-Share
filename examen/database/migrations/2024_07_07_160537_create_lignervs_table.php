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
        Schema::create('lignervs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donneur_id');
            $table->foreignId('rendezvous_id');
            $table->date('daterv');
            $table->time('heurerv');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lignervs');
    }
};
