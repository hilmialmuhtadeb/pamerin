<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistLoginController;
use App\Http\Controllers\ArtistRegistrationController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\AuctionController;
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
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TickdtController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommissionController;
use App\Models\Exhibition;
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

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::patch('/pengajuan/{exhibition}', [ExhibitionController::class, 'addStages'])->name('exhibitions.addStages');
Route::patch('/publikasi/{exhibition}', [ExhibitionController::class, 'updatePublication'])->name('exhibitions.updatePublication');
Route::get('/publikasi/{exhibition}', [ExhibitionController::class, 'publication'])->name('exhibitions.publication');
Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
Route::get('/publikasi', [AdminController::class, 'publikasi'])->name('admin.publikasi');
Route::get('/berlangsung', [AdminController::class, 'berlangsung'])->name('admin.berlangsung');
Route::get('/selesai', [AdminController::class, 'selesai'])->name('admin.selesai');
Route::get('/tersedia', [AdminController::class, 'tersedia'])->name('admin.tersedia');
Route::get('/dikirim', [AdminController::class, 'dikirim'])->name('admin.dikirim');
Route::get('/finish', [AdminController::class, 'finish'])->name('admin.finish');
Route::patch('/addStatus/{artwork}', [ArtworkController::class, 'addStatus'])->name('artworks.addStatus');
Route::get('/artikel', [AdminController::class, 'artikel'])->name('admin.artikel');
Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
Route::get('/artikel-create', [AdminController::class, 'artikelcreate'])->name('admin.artikel-create');
Route::get('/artikel-ubah/{article}', [AdminController::class, 'artikelubah'])->name('admin.artikel-ubah');
Route::get('/sedia', [AdminController::class, 'sedia'])->name('admin.sedia');
Route::get('/kirim', [AdminController::class, 'kirim'])->name('admin.kirim');
Route::get('/done', [AdminController::class, 'done'])->name('admin.done');
Route::get('/karya-pameran', [AdminController::class, 'karyapameran'])->name('admin.karya-pameran');
Route::get('/tiket-pameran', [AdminController::class, 'tiketpameran'])->name('admin.tiket-pameran');
Route::get('/detail-publikasi', [AdminController::class, 'detailpublikasi'])->name('admin.detail-publikasi');
Route::get('/coba', [AdminController::class, 'coba'])->name('admin.coba');

Route::resource('exhibitions', ExhibitionController::class);
Route::resource('auctions', AuctionController::class);
Route::resource('articles', ArticleController::class);
Route::resource('artworks', ArtworkController::class);
Route::resource('categories', CategoryController::class);
Route::resource('carts', CartController::class);
Route::resource('details', DetailController::class);
Route::resource('users', UserController::class);
Route::resource('banks', BankController::class);
Route::resource('tickets', TicketController::class);
Route::resource('commissions', CommissionController::class);

Route::post('exhibitions/detail', [ExhibitionController::class, 'detail'])->name('exhibitions.detail');

Route::get('commissions/confirm', [CommissionController::class, 'confirm'])->name('commissions.confirm');

Route::post('tickets/show', [TicketController::class, 'show'])->name('tickets.show');
Route::get('tickets/confirm/payment', [TicketController::class, 'confirm'])->name('tickets.confirm');
Route::get('tickets/join', [TicketController::class, 'join'])->name('tickets.join');


Route::post('exhibitions/detail', [ExhibitionController::class, 'detail'])->name('exhibitions.detail');

Route::get('commissions/confirm', [CommissionController::class, 'confirm'])->name('commissions.confirm');

Route::post('tickets/show', [TicketController::class, 'show'])->name('tickets.show');
Route::get('tickets/confirm/payment', [TicketController::class, 'confirm'])->name('tickets.confirm');
Route::get('tickets/join', [TicketController::class, 'join'])->name('tickets.join');


Route::get('artists/porto', [ArtistController::class, 'porto'])->name('artists.porto');
Route::get('artists/bank', [BankController::class, 'create'])->name('artists.bank');
Route::get('artists/dashboard', [ArtistController::class, 'index'])->name('artists.index');
Route::get('artists/artworks', [ArtistController::class, 'artwork'])->name('artists.artworks');
Route::get('artists/artworks/sell', [ArtistController::class, 'sell'])->name('artists.artworks.sell');
Route::get('artists/artworks/accept', [ArtistController::class, 'accept'])->name('artists.artworks.accept');
Route::get('artists/artworks/send', [ArtistController::class, 'send'])->name('artists.artworks.send');
Route::get('artists/artworks/finish', [ArtistController::class, 'finish'])->name('artists.artworks.finish');

Route::get('artists/fair/pengajuan', [ArtistController::class, 'pengajuan'])->name('artists.fair.pengajuan');
Route::get('artists/fair/selesai', [ArtistController::class, 'selesai'])->name('artists.fair.selesai');
Route::get('artists/fair/berlangsung', [ArtistController::class, 'berlangsung'])->name('artists.fair.berlangsung');
Route::get('artists/fair/publikasi', [ArtistController::class, 'publikasi'])->name('artists.fair.publikasi');

Route::get('artists/sale/done', [ArtistController::class, 'done'])->name('artists.sale.done');
Route::get('artists/sale/kirim', [ArtistController::class, 'kirim'])->name('artists.sale.kirim');
Route::get('artists/sale/terima', [ArtistController::class, 'terima'])->name('artists.sale.terima');
Route::get('artists/sale/lelang', [ArtistController::class, 'lelang'])->name('artists.sale.lelang');

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

  Route::get('forget', [LoginController::class, 'forget'])->name('forget');
  Route::post('ganti', [LoginController::class, 'ganti'])->name('ganti');
  Route::get('ubah/{ubah}', [LoginController::class, 'ubah'])->name('ubah');
  Route::post('lali', [LoginController::class, 'lali'])->name('lali');

  Route::get('artists/login', [ArtistLoginController::class, 'show'])->name('artists.login');
  Route::post('artists/login', [ArtistLoginController::class, 'store']);
});

Route::post('logout', LogoutController::class)->name('logout');