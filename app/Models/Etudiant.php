<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
       'nom',
       'prenom',
       'date_naissance',
       'lieu_naissance',
       'sexe',
       'telephone',
       'email',
       'adresse',
       'niveau_id',  
    ];

    public function niveau()
    {
        return $this->belongsTo(niveau::class);
    }
    
}
