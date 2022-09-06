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

Route::get('kalan', [App\Http\Controllers\KalanController::class, 'index'])->name('kalan');

Route::prefix('admin')->group(function(){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    
    Route::get('niveaux', [App\Http\Controllers\Admin\NiveauController::class, 'index'])->name('niveaux');
    Route::get('niveaux/create', [App\Http\Controllers\Admin\NiveauController::class, 'create'])->name('niveaux');
    Route::post('niveaux/create', [App\Http\Controllers\Admin\NiveauController::class, 'store'])->name('niveaux');

    Route::get('edit-niveau/{niveau_id}', [App\Http\Controllers\Admin\NiveauController::class, 'edit']);
    Route::put('update-niveau/{niveau_id}', [App\Http\Controllers\Admin\NiveauController::class, 'update']);

    // Route::get('show-niveau/{niveau_id}', [App\Http\Controllers\Admin\NiveauController::class, 'show']);

    Route::get('classes', [App\Http\Controllers\Admin\ClasseController::class, 'index'])->name('classes.index');
    Route::post('classes/create', [App\Http\Controllers\Admin\ClasseController::class, 'store'])->name('classes.index');
    Route::get('edit-classe/{libelle}', [App\Http\Controllers\Admin\ClasseController::class, 'edit'])->name('classes.index');


    Route::get('annee', [App\Http\Controllers\Admin\AnneeController::class, 'index'])->name('annee');
    Route::get('annee/create', [App\Http\Controllers\Admin\AnneeController::class, 'create'])->name('annee');
    Route::post('annee/create', [App\Http\Controllers\Admin\AnneeController::class, 'store'])->name('annee');


    
    Route::get('eleves', [App\Http\Controllers\Admin\EleveController::class, 'index'])->name('eleves');
    Route::post('eleves', [App\Http\Controllers\Admin\EleveController::class, 'create'])->name('eleves.register');

    Route::get('enseignants', [App\Http\Controllers\Admin\EnseignantController::class, 'index'])->name('enseignants');
    Route::get('enseignant/create', [App\Http\Controllers\Admin\EnseignantController::class, 'create'])->name('enseignants');
    Route::post('ensegnant/create', [App\Http\Controllers\Admin\EnseignantController::class, 'store'])->name('enseignants.index');
    Route::get('edit-enseignant/{enseignant_id}', [App\Http\Controllers\Admin\EnseignantController::class, 'edit']);
    Route::put('update-enseignant/{enseignant_id}', [App\Http\Controllers\Admin\EnseignantController::class, 'update']);


    Route::get('parents', [App\Http\Controllers\Admin\ParentController::class, 'index'])->name('parents');
    Route::get('parents/create', [App\Http\Controllers\Admin\ParentController::class, 'create'])->name('admin.parents.create');
    Route::post('parents/create', [App\Http\Controllers\Admin\ParentController::class, 'store'])->name('admin.parents.index');

    Route::get('secretaires', [App\Http\Controllers\Admin\SecretaireController::class, 'index'])->name('secretaires');
    Route::get('secretaires/create', [App\Http\Controllers\Admin\SecretaireController::class, 'create'])->name('secretaires');
    Route::post('secretaires/create', [App\Http\Controllers\Admin\SecretaireController::class, 'store'])->name('secretaires.index');



    Route::get('inscrit', [App\Http\Controllers\Admin\SignupController::class, 'index'])->name('admin.signup');
    Route::post('inscrit', [App\Http\Controllers\Admin\SignupController::class, 'store'])->name('admin.signup.index');
    Route::get('edit-candidat/{id}', [App\Http\Controllers\Admin\SignupController::class, 'edit'])->name('admin.signup.edit');
    Route::put('inscrit/{id}', [App\Http\Controllers\Admin\SignupController::class, 'update'])->name('admin.signup.edit');



    Route::get('mon-profile', [App\Http\Controllers\Profile\UserController::class, 'index'] )->name('mon-profile');
    Route::post('my-profile-update', [App\Http\Controllers\Profile\UserController::class, 'store'] )->name('mon-profile');


    Route::get('matieres', [App\Http\Controllers\Admin\MatiereController::class, 'index'])->name('matieres');
    Route::post('matieres/create', [App\Http\Controllers\Admin\MatiereController::class, 'store'])->name('matieres.index');
    Route::post('edit-matieres', [App\Http\Controllers\Admin\MatiereController::class, 'store'])->name('matieres.index');

    Route::post('delete-matieres', [App\Http\Controllers\Admin\MatiereController::class, 'destroy'])->name('matieres.index');


    Route::get('calendrier/index', [App\Http\Controllers\Admin\CalendrierController::class, 'index'])->name('calendrier.index');
    Route::post('calendrier', [App\Http\Controllers\Admin\CalendrierController::class, 'store'])->name('calendrier.store');
    Route::patch('calendrier/update/{id}', [App\Http\Controllers\Admin\CalendrierController::class, 'update'])->name('calendrier.update');

    Route::get('findStudent', [App\Http\Controllers\Admin\SignupController::class, 'findStudentConfirmed'])->name('admin.signup.index');


    




    
});


################## Fin de Groupe fonction de l'administrateur  ########################


################## Début  Groupe fonction du parent  ########################


Route::prefix('parent')->group(function(){

    Route::get('dashboard', [App\Http\Controllers\Parent\DashboardController::class, 'index'])->name('parent.dashboard');

    Route::get('signup', [App\Http\Controllers\Parent\SignupController::class, 'index']);
    Route::get('signup-create', [App\Http\Controllers\Parent\SignupController::class, 'create']);
    Route::post('signup-create', [App\Http\Controllers\Parent\SignupController::class, 'store']);

    
    Route::get('mon-profile', [App\Http\Controllers\Profile\UserController::class, 'index'] )->name('mon-profile');
    Route::post('my-profile-update', [App\Http\Controllers\Profile\UserController::class, 'store'] )->name('mon-profile');


    Route::get('edit-eleve/{eleve_id}', [App\Http\Controllers\Parent\SignupController::class, 'edit'])->name('parent.edit');
    Route::put('signup/{signup-update}', [App\Http\Controllers\Parent\SignupController::class, 'update'])->name('parents.signup');


});


################## Fin  Groupe fonction de l'administrateur  ########################


Route::prefix('eleves')->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\secretairesController::class, 'dashboard'])->name('secretaires.dashboard');




});

