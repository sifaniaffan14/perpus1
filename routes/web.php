<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailBukuController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanCreateController;
use App\Http\Controllers\PeminjamanDetailController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\loginCheck;
use App\Http\Middleware\RoleAnggota;
use App\Models\PeminjamanDetail;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ViewController::class, 'home']);


Auth::routes();


// Route::get('/barcode/{code}', function ($code) {
//     $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
//     return response($generator->getBarcode($code, $generator::TYPE_CODE_128), 200, ['Content-Type' => 'image/png']);
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','role:1']], function () {
    Route::get('/admin-dashboard',[DashboardController::class, 'admin'])->name('admin-dashboard');
    
    Route::controller(BukuController::class)->name('buku.')->prefix('buku')->group(function () {
        $route = array('index', 'insert', 'update','select', 'delete', 'getData');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(KategoriBukuController::class)->name('kategoriBuku.')->prefix('kategoriBuku')->group(function () {
        $route = array('index', 'insert', 'update','select', 'delete');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(DetailBukuController::class)->name('detailBuku.')->prefix('detailBuku')->group(function () {
        $route = array('index', 'insert', 'update','select', 'delete');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(DashboardController::class)->name('dashboard.')->prefix('dashboard')->group(function () {
        $route = array('admin');  
        foreach ($route as $route) {
            Route::any($route=='admin'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(RoleController::class)->name('role.')->prefix('role')->group(function () {
        $route = array('index', 'insert', 'update','select', 'delete');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
        $route = array('index', 'insert', 'update','select', 'delete', 'getRole');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(PeminjamanController::class)->name('peminjaman.')->prefix('peminjaman')->group(function () {
        $route = array('index','formPeminjaman', 'insert', 'update','select', 'delete', 'getAnggota','selectAnggota', 'selectEksemplar');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(PeminjamanDetailController::class)->name('detailPeminjaman.')->prefix('detailPeminjaman')->group(function () {
        $route = array('index', 'insert', 'update','select', 'delete');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(PeminjamanCreateController::class)->name('createPeminjaman.')->prefix('createPeminjaman')->group(function () {
        $route = array('index');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(AnggotaController::class)->name('anggota.')->prefix('anggota')->group(function () {
        $route = array('index', 'insert', 'update','select', 'delete');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(PengembalianController::class)->name('pengembalian.')->prefix('pengembalian')->group(function () {
        $route = array('index', 'update','select','select_eksemplar');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });
   
});

Route::group(['middleware' => ['auth','role:2']], function () {
    Route::get('/dashboard',[DashboardController::class, 'anggota'])->name('dashboard');
});