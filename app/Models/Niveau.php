<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table = 'niveau';

    protected $fillable = [
         'code',
         'nom',
         'description',
         'frais_inscription',
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class, 'niveau_id');
    }
}
