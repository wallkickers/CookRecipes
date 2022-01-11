<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\RecipeController;

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

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes');

// レシピ作成・更新
Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe_create');
Route::post('/recipe/create', [RecipeController::class, 'update'])->name('recipe_create_update');
