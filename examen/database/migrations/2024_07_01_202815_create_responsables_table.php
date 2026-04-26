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
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->string('code_unique')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date('naissance');
            $table->string('sexe');
            $table->string('ville');
            $table->string('telephone');
            $table->string('email');
            $table->string('boite_postale');
            $table->string('login');
            $table->string('motdepasse');
            $table->string('fonction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsables');
    }
};
