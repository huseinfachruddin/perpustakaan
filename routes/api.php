<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/content', [ContentController::class,'getContent']);
Route::get('/content/category/{id}', [ContentController::class,'getContentCategory']);
Route::get('/content/{id}', [ContentController::class,'detailContent']);
Route::post('/content/search', [ContentController::class,'getSearchContent']);
Route::post('/content/create', [ContentController::class,'createContent']);
Route::put('/content/edit/{id}', [ContentController::class,'editContent']);
Route::delete('/content/delete/{id}', [ContentController::class,'deleteContent']);

Route::get('/category', [CategoryController::class,'getCategory']);
Route::get('/category/isheader', [CategoryController::class,'getCategoryHeader']);
Route::get('/category/notheader', [CategoryController::class,'getCategoryNotHeader']);
Route::get('/category/tree', [CategoryController::class,'getCategoryTree']);

Route::get('/category/{id}', [CategoryController::class,'detailCategory']);
Route::post('/category/search', [CategoryController::class,'getSearchCategory']);
Route::post('/category/create', [CategoryController::class,'createCategory']);
Route::put('/category/edit/{id}', [CategoryController::class,'editCategory']);
Route::delete('/category/delete/{id}', [CategoryController::class,'deleteCategory']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
