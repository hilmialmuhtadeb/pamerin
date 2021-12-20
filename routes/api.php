<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ExhibitionController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/article', [ApiController::class, 'article'])->name('article.index');
 Route::resource('article', ArticleController::class);
 Route::resource('exhibitions', ExhibitionController::class);
 Route::resource('users',UserController::class);
 Route::resource('password_resets',PasswordController::class);
