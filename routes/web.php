<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\datauserController;
use App\Http\Controllers\dataODPController;
use App\Http\Controllers\dataOLTController;
use App\Http\Controllers\registrasiController;
use App\Http\Controllers\hasilRegisController;
use App\Http\Controllers\logoutController;


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

Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();

//data User
Route::get('/data', [datauserController::class, 'index'])->name('index');
Route::get('/cariUser',[datauserController::class,'searchuser']);
Route::get('qrcode/{id}/user',[datauserController::class,'generate'])->name('generateUser');
Route::post('/importuser',[datauserController::class,'importuser'])->name('importUser');
Route::get('/edit/{id}/data', [datauserController::class, 'edit']);
Route::post('/update/{id}/data', [datauserController::class, 'update']);
Route::get('/hapus/{id}/data', [datauserController::class, 'hapus']);
//data FAT
Route::get('/indexODP',[dataODPController::class,'index'])->name('index');
Route::get('/cariODP',[dataODPController::class,'searchODP']);
Route::get('qrcode/{id}/ODP',[dataODPController::class,'generate'])->name('generateODP');
Route::post('/importODP',[dataODPController::class,'importMaps'])->name('importMaps');
Route::get('/edit/{id}/ODP', [dataODPController::class, 'edit']);
Route::post('/update/{id}/ODP', [dataODPController::class, 'update']);
Route::get('/hapus/{id}/ODP', [dataODPController::class, 'hapus']);
// data OLT
Route::get('/indexOLT',[dataOLTController::class,'index'])->name('index');
Route::get('/cariOLT',[dataOLTController::class,'searchOLT']);
Route::get('qrcode/{id}/OLT',[dataOLTController::class,'generate'])->name('generateOLT');
Route::post('/importOLT',[dataOLTController::class,'importOLT'])->name('importOLT');
Route::get('/edit/{id}/OLT', [dataOLTController::class, 'edit']);
Route::post('/update/{id}/OLT', [dataOLTController::class, 'update']);
Route::get('/hapus/{id}/OLT', [dataOLTController::class, 'hapus']);
// registrasi User
Route::get('/indexRegistrasi',[registrasiController::class,'index'])->name('index');
Route::post('/storeRegis',[registrasiController::class,'store']);
// hasilregis
Route::get('/tableRegis',[hasilRegisController::class,'index'])->name('index');
Route::get('/edit/{id}/regis', [hasilRegisController::class, 'edit']);
Route::post('/update/{id}/regis', [hasilRegisController::class, 'update']);
Route::get('/hapus/{id}/regis', [hasilRegisController::class, 'hapus']);
//logout
Route::get('/logout',[logoutController::class,'logout']);