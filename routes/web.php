<?php

use App\Http\Controllers\HomePenyewaController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\HomePenyediaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ReportPenyediaController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('User.home');
// })->name('home');

Auth::routes();

Route::get('/', [HomePenyewaController::class, 'index'])->name('HomeUser');

Route::get('/ShowKost/{id_penyedia}', [HomePenyewaController::class, 'ShowKost'])->name('DetailKost');

Route::get('/admin/home', [SuperAdminController::class, 'home'])->name('HomeSAdmin');

Route::resource('admin', SuperAdminController::class);

Route::resource('penyewa', PenyewaController::class);

Route::resource('transaksi', TransaksiController::class);

Route::resource('penyedia', PenyediaController::class);

Route::resource('kamar', KamarController::class);

Route::resource('Report', ReportPenyediaController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/booking/user', function () {
        return view('User.booking');
    });
    // Route::get('/booking/{id}', [UserController::class, 'booking']);

    Route::get('/payment/user', function () {
        return view('User.payment');
    });

    Route::get('/report/user', function () {
        return view('User.report.create');
    });

    Route::get('/report/penyediaKost', function () {
        return view('PenyediaKost.report.create');
    });

    Route::resource('ReportUser', ReportController::class);

    Route::get('/profile/user', function () {
        return view('User.profile');
    })->name('profile');

    Route::get('/daftarkos/user', function () {
        return view('User.DaftarKost');
    });

    Route::post('/daftarkos/simpan', [PenyediaController::class, 'simpan']);

    Route::get('/home/penyedia', function () {
        return view('PenyediaKost.home');
    });

    Route::get('/menu/penyewa', [PenyewaController::class, 'MenuPenyewa']);
});

Route::get('/report/admin', [ReportController::class, 'Admin']);

Route::get('/penyediakost/home', [HomePenyediaController::class, 'home']);
