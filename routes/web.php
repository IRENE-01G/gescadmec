<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\BesoinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// route pour s'authentifier
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// route pour l'inscription

Route::get('/inscription', [InscriptionController::class, 'showInscriptionForm'])->name('inscription.form');
Route::post('/inscription', [InscriptionController::class, 'inscription'])->name('inscription.submit');
// route pour de dashboard

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/niveau', [NiveauController::class, 'index'])->name('niveau.index');
Route::post('/niveau', [NiveauController::class, 'store'])->name('niveau.store'); 
Route::get('/formation', [NiveauController::class, 'index'])->name('formation.index');
Route::post('/formation', [NiveauController ::class,'store'])->name('formation.store'); 
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::post('/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
// routes pour éditer / mettre à jour / supprimer un étudiant

Route::get('/etudiant/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/supprimer', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');

