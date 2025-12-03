<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
   protected $table = 'paiement';
    protected $fillable = [
         'etudiant_id',
         'montant',
         'date_paiement',
         'mode_paiement',
         'statut',
    ];
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }
}
