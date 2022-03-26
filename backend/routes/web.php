<?php

use App\Http\Controllers\Web\RecipeController;
use App\Http\Controllers\Web\ShoppingThingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [RecipeController::class, 'index'])->name('recipes');

// レシピ作成・編集・更新
Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe_create');
Route::get('/recipe/edit/{recipeId}', [RecipeController::class, 'edit'])->name('recipe_edit');
Route::post('/recipe/insert', [RecipeController::class, 'insert'])->name('recipe_create_update');
Route::post('/recipe/update', [RecipeController::class, 'update'])->name('recipe_update');

// レシピ詳細
Route::get('/recipe/{recipeId}', [RecipeController::class, 'detail'])->name('recipe_detail');

// レシピ削除
Route::post('/recipe/delete/{recipeId}', [RecipeController::class, 'delete'])->name('recipe_delete');

// メモ
Route::prefix('shopping_things')->name('shopping_things.')->group(function(){
    Route::get('/', [ShoppingThingController::class, 'index'])->name('index');
    Route::get('/recipe_select', [ShoppingThingController::class, 'recipeSelect'])->name('recipe_select');
    Route::post('/create_memo', [ShoppingThingController::class, 'createMemo'])->name('create_memo');
    Route::post('/insert', [ShoppingThingController::class, 'insert'])->name('insert');
    Route::get('/edit', [ShoppingThingController::class, 'edit'])->name('edit');
});
