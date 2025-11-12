<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;


class NiveauController extends Controller
{
    public function index()
    {
        $niveaux = Niveau::all();
        return view('niveau', compact('niveaux'));

    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:50|unique:niveau,code',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            
            
        ]);

        Niveau::create($validatedData);
        return redirect()->route('niveau')->with('success', 'Niveau créé avec succès.');


    }
}
