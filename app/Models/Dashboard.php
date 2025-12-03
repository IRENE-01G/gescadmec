<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table='dashboard';
    protected $fillable = [
       'etudiant_id',
       'montant',
      
      
    ];

    public function niveau()
    {
        return $this->belongsTo(niveau::class);
        
    }
    
}
