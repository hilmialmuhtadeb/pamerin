<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ExhibitionController;
// use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LikeController;
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
//API route for register new user
Route::post('/register', [App\Http\Controllers\Api\LoginController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\api\LoginController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/article', [ApiController::class, 'article'])->name('article.index');
 Route::resource('article', ArticleController::class);
 Route::resource('exhibitions', ExhibitionController::class);
 Route::resource('users',UserController::class);
 Route::get('/make/like/{pameran_id}',[LikeController::class,'add_like'])->name('api.add-like');
//  Route::resource('password_resets',PasswordController::class);
