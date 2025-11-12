<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Niveau;

class NiveauSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Niveau::create([
            'code' => 'NIV001',
            'nom' => 'Licence 1',
            'description' => 'Première année de licence',
            'frais_inscription' => 100.000,
        ]);
        Niveau::create([
            'code' => 'NIV002',
            'nom' => 'Licence 2',
            'description' => 'Deuxième année de licence',
            'frais_inscription' => 150.000,
        ]);
    }
}
