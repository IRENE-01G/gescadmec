<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = [
         'code',
         'nom',
         'description',
         
    ];  
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
