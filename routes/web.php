<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistLoginController;
use App\Http\Controllers\ArtistRegistrationController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ShippingCostController;
use App\Http\Controllers\UserController;
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

Route::get('/', HomeController::class)->name('home');

Route::resource('exhibitions', ExhibitionController::class);
Route::resource('articles', ArticleController::class);
Route::resource('artworks', ArtworkController::class);
Route::resource('categories', CategoryController::class);
Route::resource('carts', CartController::class);
Route::resource('details', DetailController::class);
Route::resource('users', UserController::class);
Route::resource('banks', BankController::class);

Route::get('artists/bank', [BankController::class, 'create'])->name('artists.bank');
Route::get('artists/dashboard', [ArtistController::class, 'index'])->name('artists.index');
Route::get('artists/artworks', [ArtistController::class, 'artwork'])->name('artists.artworks');
Route::get('artists/artworks/sell', [ArtistController::class, 'sell'])->name('artists.artworks.sell');

Route::get('artworks/{artwork}/shipping', [ShippingCostController::class, 'create'])->name('artworks.shipping');
Route::post('artworks/{artwork}/shipping', [ShippingCostController::class, 'store']);
Route::patch('artworks/{artwork}/sell', [ArtworkController::class, 'sell'])->name('artworks.sell');

Route::middleware('guest')->group(function() {
  Route::get('registration', [RegistrationController::class, 'create'])->name('register');
  Route::post('registration', [RegistrationController::class, 'store']);

  Route::get('artists/registration', [ArtistRegistrationController::class, 'create'])->name('artists.register');
  Route::post('artists/registration', [ArtistRegistrationController::class, 'store']);
  
  Route::get('login', [LoginController::class, 'show'])->name('login');
  Route::post('login', [LoginController::class, 'store']);

  Route::get('artists/login', [ArtistLoginController::class, 'show'])->name('artists.login');
  Route::post('artists/login', [ArtistLoginController::class, 'store']);
});

Route::post('logout', LogoutController::class)->name('logout');