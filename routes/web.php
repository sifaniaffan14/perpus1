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
use App\Http\Controllers\PerpanjanganController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
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


Auth::routes();


// Route::get('/barcode/{code}', function ($code) {
//     $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
//     return response($generator->getBarcode($code, $generator::TYPE_CODE_128), 200, ['Content-Type' => 'image/png']);
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware([loginCheck::class])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin-dashboard',[DashboardController::class, 'admin'])->name('admin-dashboard');
    
    Route::get('/bukumanagement',[App\Http\Controllers\BukuController::class, 'list'])->name('bukumanagement');
    Route::get('/bukuForm',[App\Http\Controllers\BukuController::class, 'form'])->name('buku.form');
    Route::post('/bukuForm',[App\Http\Controllers\BukuController::class, 'formEdit'])->name('buku.formedit');
    Route::post('/bukuAdd',[App\Http\Controllers\BukuController::class, 'add'])->name('buku.add');
    Route::post("deleteBuku/{id}",[App\Http\Controllers\BukuController::class, 'delete'])->name('buku.delete');
    Route::post('/editBuku/{id}', [App\Http\Controllers\BukuController::class, 'update']);

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

    Route::controller(PerpanjanganController::class)->name('perpanjangan.')->prefix('perpanjangan')->group(function () {
        $route = array('index', 'select', 'selectDetail', 'rejectPerpanjangan', 'SubmitPerpanjangan');  
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
    //peminjaman start
    Route::get('/bukupeminjaman',[App\Http\Controllers\PeminjamanController::class, 'list'])->name('bukupeminjaman');
    //peminjaman end

    // Route::post('/add-update-book', [App\Http\Controllers\BukuController::class, 'add']);
    Route::get('/listKategori', [App\Http\Controllers\KategoriBukuController::class, 'list']);
    Route::post('/addKategori', [App\Http\Controllers\KategoriBukuController::class, 'add']);
    Route::post('/deleteKategori/{id}', [App\Http\Controllers\KategoriBukuController::class, 'delete']);
    Route::post('/editKategori/{id}', [App\Http\Controllers\KategoriBukuController::class, 'update']);

    Route::get('/detailBuku/{id}',[BukuController::class, 'detailBuku'])->name('detailbuku.view');

    Route::post('/listEksemplar/{id}', [App\Http\Controllers\DetailBukuController::class, 'listEksemplar']);
    Route::post('/addEksemplar', [App\Http\Controllers\DetailBukuController::class, 'add']);
    Route::post('/editEksemplar/{id}', [App\Http\Controllers\DetailBukuController::class, 'update']);
    Route::get('/deleteEksemplar/{id}', [App\Http\Controllers\DetailBukuController::class, 'delete']);

    Route::get('/barcodeBuku',[App\Http\Controllers\BarcodeController::class, 'getBarcode'])->name('barcodeBuku.view');
    Route::post('tes/barcodeBuku',[App\Http\Controllers\BarcodeController::class, 'getBarcode'])->name('barcodeBuku.post');
    Route::get('/PrintBarcode',[App\Http\Controllers\BarcodeController::class, 'printBarcode'])->name('barcodeBuku.print');

    Route::get('/detailPeminjaman/{id}',[App\Http\Controllers\PeminjamanController::class, 'detailPeminjaman'])->name('detailPeminjaman.view');
    Route::get('/peminjamanForm',[App\Http\Controllers\PeminjamanController::class, 'form'])->name('peminjaman.form');
    Route::get('/addPeminjaman',[App\Http\Controllers\PeminjamanController::class, 'add'])->name('detailPeminjaman.view');
    Route::get('/findNoInduk',[App\Http\Controllers\PeminjamanController::class, 'findNoInduk'])->name('findNoInduk');
    Route::get('/findBukuEksemplar',[App\Http\Controllers\PeminjamanController::class, 'findBukuEksemplar'])->name('findBukuEksemplar');

    Route::get('/anggotamanagement',[App\Http\Controllers\AnggotaController::class, 'list'])->name('anggotamanagement');
    Route::get('/anggotaForm',[App\Http\Controllers\AnggotaController::class, 'form'])->name('anggota.form');
    Route::post('/anggotaForm',[App\Http\Controllers\AnggotaController::class, 'formEdit'])->name('anggota.formedit');
    Route::post('/anggotaAdd',[App\Http\Controllers\AnggotaController::class, 'insert'])->name('anggota.insert');
    Route::post('/editAnggota/{id}', [App\Http\Controllers\AnggotaController::class, 'update']);
    Route::post("deleteAnggota/{id}",[App\Http\Controllers\AnggotaController::class, 'delete'])->name('anggota.delete');
    Route::get('/detailAnggota/{id}',[App\Http\Controllers\AnggotaController::class, 'detailAnggota'])->name('detailanggota.view');
    Route::post('/search/{id}',[App\Http\Controllers\PeminjamanController::class, 'search'])->name('anggota.search');
// });