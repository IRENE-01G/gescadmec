<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Inscription extends Model
{
    protected $table = 'inscription';

    protected $fillable = [
        'etudiant_id',
        'niveau_id',
        'annee_academique',
        'date_inscription',
        'statut',
        'frais',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'niveau_id');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'inscription_id');
    }
}
