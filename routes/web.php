<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\Admin\AnnonceController;
use App\Http\Controllers\public\DetailController;
use App\Http\Controllers\public\PublicController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    //exercice
    Route::get('/create', [ExerciceController::class, 'create'])->name('create');
    Route::post('/store', [ExerciceController::class, 'store'])->name('store');
    Route::post('/excercice', [ExerciceController::class, 'index'])->name('index');

     // route pour afficher des annonces
    Route::get('/', [PublicController::class, 'index'])->name('welcome');
    //  route pour afficher des annonces par categorie
    Route::get('/trier/{id}', [PublicController::class, 'index'])->name('trier');
    //  route pour afficher une annonce
    Route::get('/detail/{annonce}', [DetailController::class, 'show'])->name('publicclient.detail');

    //autorisation pour tous les utilisateurs
Route::middleware('auth')->group(function () {
    Route::get('/profile/favoris/{id}', [ProfileController::class, 'favorisAdd'])->name('profile.favoris.add');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // gestion route pour creer les annonces
        Route::get('/admin/annonce/create', [AnnonceController::class, 'create'])->name('admin.annonce.create');
        Route::post('/admin/annonce/store', [AnnonceController::class, 'store'])->name('admin.annonce.store');
        Route::get('/admin/annonce', [AnnonceController::class, 'index'])->name('admin.annonce');
            //Route du formulaire de suppression 
    Route::get('admin/annonce/del/{id}',[AnnonceController::class,'destroy'])->name('admin.annonce.destroy');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Route::middleware('auth','can:user')->group(function () {
        // gestion route pour l'utilisateur
        //Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    //});
    
});
Route::middleware('auth','can:admin')->group(function () {
    // gestion route pour l'administration
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    // gestion route pour modifier les annonces
    Route::get('/admin/annonce/edit/{id}', [AnnonceController::class, 'edit'])->name('admin.annonce.edit');
    Route::post('/admin/annonce/upd/{id}', [AnnonceController::class, 'update'])->name('admin.annonce.update');

    //route ajout categorie
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category');

    //route formulaire d'édition de categorie
    
    Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.edit');

    //Route du formulaire de suppression 
    Route::get('admin/category/del/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
});
require __DIR__.'/auth.php';
