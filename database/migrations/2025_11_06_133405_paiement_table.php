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
        Schema::create('paiement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->nullable()->constrained('etudiant')->onDelete('cascade');
            $table->foreignId('inscription_id')->nullable()->constrained('inscription')->onDelete('cascade');
            $table->decimal('montant', 10, 2);
            $table->string('reference')->nullable();
            $table->enum('statut', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamp('date_paiement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement');
    }
};
