<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Besoin extends Model
{
    protected $table = 'besoin';
    protected $fillable = [
        'etudiant_id',
        'type',
        'description',
        'statut',
        'montant',
        'date_demande',
        'date_traitement',
    ];
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
