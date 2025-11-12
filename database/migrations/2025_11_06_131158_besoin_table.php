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
        Schema::create('besoin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiant')->onDelete('cascade');
            $table->string('type');
            $table->text('description')->nullable();
            $table->enum('statut', ['open', 'in_progress', 'resolved', 'closed'])->default('open');
            $table->decimal('montant', 10, 2)->nullable();
            $table->timestamp('date_demande')->useCurrent();
            $table->timestamp('date_traitement')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('besoin');
    }
};
