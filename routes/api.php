<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
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
Route::get('/content/{id}', [ContentController::class,'detailContent']);
Route::post('/content/search', [ContentController::class,'getSearchContent']);
Route::post('/content/create', [ContentController::class,'createContent']);
Route::put('/content/edit/{id}', [ContentController::class,'editContent']);
Route::delete('/content/delete/{id}', [ContentController::class,'deleteContent']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
