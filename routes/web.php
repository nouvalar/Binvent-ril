<?php

use App\Http\Controllers\BuatakunController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\ListbarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
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
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// **Route untuk Admin**
Route::middleware(['role:admin'])->group(function () {
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
});


// **Route untuk Staff**
Route::middleware(['role:staff'])->group(function () {
    Route::get('/staff/dashboardstaff', function () {
        return view('staff.dashboardstaff');
    })->name('staff.dashboardstaff');
    Route::get('/staff/dashboardstaff', [StaffController::class, 'dashboardstaff'])->name('staff.dashboardstaff');

    Route::get('/staff/listbarang-elektronik', function () {
        return view('staff.listbarang-elektronik');
    })->name('staff.listbarang-elektronik');
    Route::get('/staff/listbarang-elektronik', [StaffController::class, 'listBarangElektronik'])->name('staff.listbarang-elektronik');


    Route::get('/staff/listbarang-komponen', function () {
        return view('staff.listbarang-komponen');
    })->name('staff.listbarang-komponen');
    Route::get('/staff/listbarang-komponen', [StaffController::class, 'listBarangKomponen'])->name('staff.listbarang-komponen');

    Route::get('/staff/listbarang-logistik', function () {
        return view('staff.listbarang-logistik');
    })->name('staff.listbarang-logistik');
    Route::get('/staff/listbarang-logistik', [StaffController::class, 'listBarangLogistik'])->name('staff.listbarang-logistik');

    Route::get('/staff/listbarang-perkakas', function () {
        return view('staff.listbarang-perkakas');
    })->name('staff.listbarang-perkakas');
    Route::get('/staff/listbarang-perkakas', [StaffController::class, 'listBarangPerkakas'])->name('staff.listbarang-perkakas');

    Route::post('/logout', [StaffController::class, 'logout'])->name('logout');
});