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
Route::get('/etudiant/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');


Route::get('/paiement', [PaiementController::class, 'index'])->name('paiement.index');
Route::get('/paiement/creer', [PaiementController::class, 'create'])->name('paiement.create');
Route::post('/paiement', [PaiementController::class, 'store'])->name('paiement.store');
Route::get('/paiement/{id}', [PaiementController::class, 'show'])->name('paiement.show');

Route::get('/paiement/{paiement}/edit', [PaiementController::class, 'edit'])->name('paiement.edit');
Route::put('/paiement/{paiement}', [PaiementController::class, 'update'])->name('paiement.update');
Route::delete('/paiement/{paiement}', [PaiementController::class, 'destroy'])->name('paiement.destroy');

// Besoins
Route::get('/besoin', [BesoinController::class, 'index'])->name('besoin.index');
Route::get('/besoin/creer', [BesoinController::class, 'create'])->name('besoin.create');
Route::post('/besoin', [BesoinController::class, 'store'])->name('besoin.store');
Route::get('/besoin/{besoin}/edit', [BesoinController::class, 'edit'])->name('besoin.edit');
Route::put('/besoin/{besoin}', [BesoinController::class, 'update'])->name('besoin.update');
Route::delete('/besoin/{besoin}', [BesoinController::class, 'destroy'])->name('besoin.destroy');
