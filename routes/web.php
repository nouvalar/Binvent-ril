<?php

use App\Http\Controllers\BuatakunController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\ListbarangController;
use App\Http\Controllers\LoginController;
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

// web.php

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/admin/dashboardadmin', [ListBarangController::class, 'dashboard'])->name('admin.dashboardadmin');
Route::get('/admin/dashboardakun', [KelolaakunController::class, 'dashboardakun'])->name('admin.dashboardakun');


Route::get('/admin/buatakun', [BuatakunController::class, 'showUser'])->name('buatakun.show');
Route::post('/admin/buatakun', [BuatakunController::class, 'store'])->name('buatakun.store');

Route::get('/admin/kelolaakun', [KelolaAkunController::class, 'index'])->name('admin.kelolaakun');
Route::put('/admin/update/{id}', [KelolaAkunController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{id}', [KelolaAkunController::class, 'destroy'])->name('admin.delete');

Route::get('/admin/editstock', function () {
    return view('admin.editstock');
});

Route::get('/admin/listbarang', [ListbarangController::class, 'index'])->name('admin.listbarang');

Route::get('/admin/inputbarang', function () {
    return view('admin.inputbarang');
})->name('admin.inputbarang');

Route::post('/admin/inputbarang', [DataBarangController::class, 'store'])->name('databarang.store');