<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemeliharaanKomputerController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProsedurController;
use App\Http\Controllers\SoftwareController;
use App\Models\Perbaikan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/monitoring', function () {
        return view('monitoring.laboratorium',[
            'title'=>'monitoring',
            'active'=>'monitoring',
        ]);
    });
    Route::get('/monitoring/lab', function () {
        return view('monitoring.komputer',[
            'title'=>'monitoring',
            'active'=>'monitoring',
        ]);
    });
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        // route group untuk role admin : manajemen pengguna dan lab
        Route::resource('pengguna', PenggunaController::class);
        Route::resource('lab', LabController::class);
    });

    Route::resource('profile', ProfileController::class);
    Route::put('/updatePassword/{id}', [ProfileController::class, 'updatePassword']);
    Route::put('/updateDataUser/{id}', [PenggunaController::class, 'updateDataUser']);

    Route::middleware(['tim_mr'])->group(function () {
        // route untuk tim MR : manajemen komputer,hadrdware,software,aset,pemeliharaan dan perbaikan
        Route::resource('komputer', KomputerController::class);
        Route::get('/komputer/lab/{id}', [KomputerController::class, 'shortByLab']);
        Route::post('/komputer/simpan', [KomputerController::class, 'simpan']);
        Route::get('/komputer/detail/{id}/{lab}', [KomputerController::class, 'detail']);
        Route::get('/komputer/getData/{no_pc}/{lab_id}', [KomputerController::class, 'getData']);
        Route::post('/komputer/updateHardware/{id}/{lab}', [KomputerController::class, 'updatehardware']);
        Route::post('/komputer/updateSoftware/{id}/{lab}', [KomputerController::class, 'updatesoftware']);

        // pemeliharaan dan sesi pemeliharaan
        Route::get('/pemeliharaan', [PemeliharaanKomputerController::class, 'index']);
        Route::get('/pemeliharaan/sesi/{id}/{lab_id}', [PemeliharaanKomputerController::class, 'komputer']);
        Route::post('/pemeliharaan', [PemeliharaanKomputerController::class, 'store']);
        Route::get('/pemeliharaan/detail/{id}', [PemeliharaanKomputerController::class, 'getData']);
        Route::post('/pemeliharaan/tambah', [PemeliharaanKomputerController::class, 'simpanPemeliharaan']);

        // perbaikan
        Route::resource('perbaikan',PerbaikanController::class);

        // master data
        Route::resource('hardware', HardwareController::class);
        Route::resource('software', SoftwareController::class);
        Route::resource('aset', AsetController::class);
        Route::resource('prosedur', ProsedurController::class);
    });
    Route::middleware(['kepala'])->group(function () {
        // route group untuk role kepala : monitoring keadaan lab dan laporan
    });
});
// otentikasi
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
