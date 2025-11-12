<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    protected $table = 'Inscription';
    protected $fillable = [
        'etudiant_id',
        'niveau_id',
        'date_inscription',
        'frais',
        'statut',
    ];
    public function etudiant()
    {
        return $this->hasMany(Etudiant::class);
    }                   
}
