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
        Schema::create('donneurs', function (Blueprint $table) {
            $table->id();
            $table->string('code_unique')->unique();
            $table->foreignId('groupesanguin_id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('naissance');
            $table->string('sexe');
            $table->string('ville');
            $table->string('telephone');
            $table->string('email');
            $table->string('login');
            $table->string('motdepasse');
            $table->foreignId('localite_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donneurs');
    }
};
