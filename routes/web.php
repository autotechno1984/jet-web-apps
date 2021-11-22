<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ResultController;
use App\Http\Livewire\Results;
use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
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
Auth::routes();




Route::get('/', function() {

    $whatsapp = Contact::select('aplikasi','url')->get();


    return view('front.index',compact('whatsapp'));

});
Route::middleware(['auth','PreventBackHistory'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

});

Route::prefix('admin-panel')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','checkIp','PreventBackHistory'])->group(function(){
        Route::view('/login', 'backend.adminlogin')->name('login');
        Route::post('/check', [AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home',[AdminController::class,'home'])->name('home');
        Route::post('/logout', [AdminController::class,'logout'])->name('logout');

        Route::get('/web-setting',[AdminController::class,'websetting'])->name('websetting');
        //Members
        Route::get('/user-list', [UserController::class, 'members'])->name('user-list');
        Route::get('/data', [UserController::class, 'data'])->name('data');
        Route::resource('/users', UserController::class , ['names' => [
            'index' => 'users.index',
            'create' => 'users.create',
            'store' => 'users.store',
            'show' => 'users.show',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'delete' => 'users.delete'
        ]]);

//Games
        Route::view('/admin-panel/games', [\App\Http\Controllers\GamesController::class, 'games'])->name('games');
        Route::resource('/games', GamesController::class , ['names' => [
            'index' => 'games.index',
            'create' => 'games.create',
            'store' => 'games.store',
            'show' => 'games.show',
            'edit' => 'games.edit',
            'update' => 'games.update',
            'delete' => 'games.delete'
        ]]);

//Market

        Route::resource('/market', MarketController::class , ['names' => [
            'index' => 'market.index',
            'create' => 'market.create',
            'store' => 'market.store',
            'show' => 'market.show',
            'edit' => 'market.edit',
            'update' => 'market.update',
            'delete' => 'market.delete'
        ]]);
//Result
//
        Route::resource('/results', ResultController::class);

//Transaksi
        Route::get('/transaksi', [GeneralController::class,'admintransaksi'])->name('admintransaksi');
        Route::put('/transaksi-reject/{id}', [GeneralController::class, 'depositreject'])->name('depositreject');
        Route::put('/transaksi-approved/{id}', [GeneralController::class, 'depositapproved'])->name('depositapproved');
        Route::put('/transaksi-wd-approved/{id}', [GeneralController::class, 'withdrawapproved'])->name('withdrawapproved');
        Route::put('/transaksi-wd-reject/{id}', [GeneralController::class, 'withdrawreject'])->name('withdrawreject');

    });

});

//Front-End







