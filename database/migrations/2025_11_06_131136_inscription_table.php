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
        Schema::create('inscription', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiant')->onDelete('cascade');
            $table->foreignId('niveau_id')->constrained('niveau')->onDelete('cascade');
            $table->string('annee_academique')->nullable();
            $table->timestamp('date_inscription')->useCurrent();
            $table->enum('statut', ['en_cours', 'validé', 'annulé'])->default('en_cours');
            $table->decimal('frais', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription');
    }
};
