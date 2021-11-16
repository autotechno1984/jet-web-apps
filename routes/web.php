<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
//Auth::routes();
Route::get('/', function(){
    return view('front.index');
});
//Route::get('/',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
//Route::post('/',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

//Front-End
Route::get('togel/{id}', [GeneralController::class,'togel'])->name('togel');
Route::post('togel/beli-angka',[GeneralController::class,'angka'])->name('angka');
Route::post('togel/beli-angkabb',[GeneralController::class,'angkabb'])->name('angkabb');
Route::post('togel/colok-bebas',[GeneralController::class,'colokbebas'])->name('colokbebas');
Route::post('togel/colok-macau',[GeneralController::class,'colokmacau'])->name('colokmacau');
Route::post('togel/colok-jitu',[GeneralController::class,'colokjitu'])->name('colokjitu');
Route::post('togel/colok-naga',[GeneralController::class,'coloknaga'])->name('coloknaga');
Route::post('togel/50-50',[GeneralController::class,'limapuluh'])->name('limapuluh');
Route::post('togel/50-spesial',[GeneralController::class,'limapuluhsp'])->name('limapuluhsp');
Route::post('togel/50-kombinasi',[GeneralController::class,'limapuluhkb'])->name('limapuluhkb');
Route::post('togel/macau',[GeneralController::class,'macau'])->name('macau');
Route::post('togel/dasar',[GeneralController::class,'dasar'])->name('dasar');
Route::post('togel/shio', [GeneralController::class, 'shio'])->name('shio');
Route::delete('togel/invoice-del/{orderid}',[GeneralController::class, 'deleteorder'])->name('deleteorder');
Route::delete('togel/invoice-delete-all', [GeneralController::class,'deleteorderall'])->name('deleteorderall');
Route::post('togel/invoice-create', [GeneralController::class,'createinvoice'])->name('createinvoice');
Route::get('members-transaksi', [GeneralController::class,'transaksi'])->name('transaksi');
Route::post('member/input-rekening', [GeneralController::class, 'datarekeninguser'])->name('datarekeninguser');
Route::post('member/depo', [GeneralController::class,'deposit'])->name('deposit');
Route::post('member/withdraw', [GeneralController::class, 'withdraw'])->name('withdraw');
Route::get('member/statement', [GeneralController::class,'statement'])->name('statement');
Route::get('member/ganti-password', [GeneralController::class,'gantipassword'])->name('gantipassword');
Route::put('member/ganti-password-baru', [GeneralController::class,'gantipasswordbaru'])->name('gantipasswordbaru');

//Members
Route::get('/admin-panel/user-list', [UserController::class, 'members'])->name('members');
Route::get('/data', [UserController::class, 'data'])->name('data');
Route::resource('/admin-panel/users', UserController::class);

//Games
//Route::get('/admin-panel/games', [\App\Http\Controllers\GamesController::class, 'games'])->name('games');
Route::resource('admin-panel/games', \App\Http\Controllers\GamesController::class);

//Market
Route::resource('admin-panel/market', MarketController::class );

//Result
Route::resource('admin-panel/results', ResultController::class);

//Transaksi
Route::get('admin-panel/transaksi', [GeneralController::class,'admintransaksi'])->name('admintransaksi');
Route::put('admin-panel/transaksi-reject/{id}', [GeneralController::class, 'depositreject'])->name('depositreject');
Route::put('admin-panel/transaksi-approved/{id}', [GeneralController::class, 'depositapproved'])->name('depositapproved');
Route::put('admin-panel/transaksi-wd-approved/{id}', [GeneralController::class, 'withdrawapproved'])->name('withdrawapproved');
Route::put('admin-panel/transaksi-wd-reject/{id}', [GeneralController::class, 'withdrawreject'])->name('withdrawreject');






