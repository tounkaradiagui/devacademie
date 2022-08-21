<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

################## Début de Groupe fonction de l'administrateur  ########################

Route::prefix('admin')->group(function(){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    
    Route::get('niveaux', [App\Http\Controllers\Admin\NiveauController::class, 'index'])->name('niveaux');
    Route::get('niveaux/create', [App\Http\Controllers\Admin\NiveauController::class, 'create'])->name('niveaux');
    Route::post('niveaux/create', [App\Http\Controllers\Admin\NiveauController::class, 'store'])->name('niveaux');

    Route::get('classes', [App\Http\Controllers\Admin\ClasseController::class, 'index'])->name('classes');
    Route::get('classes/create', [App\Http\Controllers\Admin\ClasseController::class, 'create'])->name('classes');
    Route::post('classes/create', [App\Http\Controllers\Admin\ClasseController::class, 'store'])->name('classes');

    Route::get('annee', [App\Http\Controllers\Admin\AnneeController::class, 'index'])->name('annee');
    Route::get('annee/create', [App\Http\Controllers\Admin\AnneeController::class, 'create'])->name('annee');
    Route::post('annee/create', [App\Http\Controllers\Admin\AnneeController::class, 'store'])->name('annee');


    
    Route::get('eleves', [App\Http\Controllers\Admin\EleveController::class, 'index'])->name('eleves');
    Route::post('eleves', [App\Http\Controllers\Admin\EleveController::class, 'create'])->name('eleves.register');

    Route::get('enseignants', [App\Http\Controllers\Admin\EnseignantController::class, 'index'])->name('enseignants');
    Route::get('secretaires', [App\Http\Controllers\Admin\SecretaireController::class, 'index'])->name('secretaires');
    Route::get('parents', [App\Http\Controllers\Admin\ParentController::class, 'index'])->name('parents');
});


################## Fin de Groupe fonction de l'administrateur  ########################


################## Début  Groupe fonction du parent  ########################


Route::prefix('parent')->group(function(){

    Route::get('dashboard', [App\Http\Controllers\Parent\DashboardController::class, 'index'])->name('parent.dashboard');
    Route::get('signup/list-signup', [App\Http\Controllers\Parent\SignupController::class, 'index'])->name('signup');
    Route::get('signup', [App\Http\Controllers\Parent\SignupController::class, 'create'])->name('signup');

});


################## Fin  Groupe fonction de l'administrateur  ########################


Route::prefix('eleves')->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\secretairesController::class, 'dashboard'])->name('secretaires.dashboaed');




});
