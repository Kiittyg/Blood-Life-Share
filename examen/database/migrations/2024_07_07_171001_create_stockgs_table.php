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
        Schema::create('stockgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groupesanguin_id');
            $table->foreignId('stock_id');
            $table->string('quantite');
            $table->string('qualite');
            $table->string('dateexp');
            $table->string('typestockage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockgs');
    }
};
