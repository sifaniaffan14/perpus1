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
use App\Http\Controllers\PerpanjanganController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\InformasiPentingController;
use App\Http\Controllers\Anggota\PencarianBukuController;
use App\Http\Controllers\Anggota\CekPinjamanController;
use App\Http\Controllers\Anggota\AnggotaPerpanjanganController;
use App\Http\Middleware\loginCheck;
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
Route::controller(ViewController::class)->name('landing.')->prefix('landing')->group(function () {
    $route = array('search', 'selectCategory', 'selectDetail', 'selectEksemplar');  
    foreach ($route as $route) {
        Route::any($route=='index'?'':'/'.$route, $route)->name($route);
    }
});

Auth::routes();


// Route::get('/barcode/{code}', function ($code) {
//     $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
//     return response($generator->getBarcode($code, $generator::TYPE_CODE_128), 200, ['Content-Type' => 'image/png']);
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('protectedPage:1')->group(function () {
    // Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
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

    Route::controller(InformasiPentingController::class)->name('informasiPenting.')->prefix('informasiPenting')->group(function () {
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

    Route::get('PDFBarcode/{id}', [DetailBukuController::class, 'PDFBarcode'])->name('detailBuku.PDFBarcode');

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
        $route = array('index','formPeminjaman', 'insert', 'update','select', 'delete', 'getAnggota','selectAnggota', 'selectEksemplar', 'onFilter', 'onDownload', 'selectDataAnggota');  
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

    Route::controller(PerpanjanganController::class)->name('perpanjangan.')->prefix('perpanjangan')->group(function () {
        $route = array('index', 'select', 'selectDetail', 'submitPerpanjangan', 'update', 'reset');  
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

    Route::controller(DataAnggotaController::class)->name('dataAnggota.')->prefix('dataAnggota')->group(function () {
        $route = array('index', 'select', 'insert', 'update', 'delete');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(AbsensiController::class)->name('absensi.')->prefix('absensi')->group(function () {
        $route = array('index', 'insert');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    Route::controller(PengunjungController::class)->name('pengunjung.')->prefix('pengunjung')->group(function () {
        $route = array('index', 'select', 'onFilter');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });

    //peminjaman start
    Route::get('/bukupeminjaman',[App\Http\Controllers\PeminjamanController::class, 'list'])->name('bukupeminjaman');
    //peminjaman end

    Route::controller(PengembalianController::class)->name('pengembalian.')->prefix('pengembalian')->group(function () {
        $route = array('index', 'update','select','select_eksemplar', 'selectDataAnggota');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });
});

Route::middleware('protectedPage:2')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'anggota'])->name('dashboard');

    Route::controller(PencarianBukuController::class)->name('cariBuku.')->prefix('cariBuku')->group(function () {
        $route = array('index');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });
    Route::controller(CekPinjamanController::class)->name('cekPinjaman.')->prefix('cekPinjaman')->group(function () {
        $route = array('index');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });
    Route::controller(AnggotaPerpanjanganController::class)->name('perpanjanganBuku.')->prefix('perpanjanganBuku')->group(function () {
        $route = array('index');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });
});