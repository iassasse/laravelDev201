<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/accueil', [ShopController::class, 'accueil'])->name('index');
Route::get('/catégories', [ProductController::class, 'categories'])->name('categories');
Route::get('/informatique', [ShopController::class, 'informatique'])->name('informatique');
Route::get('/petit-electromenager', [ShopController::class, 'petitElectromenage'])->name('petit-electromenager');
Route::get('/produit/{id}', [ProductController::class, 'produit'])->name('produit');
Route::get('/contact', [ShopController::class, 'contact'])->name('contact');
Route::get('/cgv', [ShopController::class, 'cgv'])->name('cgv');
Route::get('/grand-electromenage', [ShopController::class, 'grandElectromenage'])->name('grand-electromenage');
