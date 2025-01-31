<?php

use App\Http\Controllers\BuatakunController;
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

Route::get('/admin/dashboardadmin', function () {
    return view('admin.dashboardadmin');
})->name('dashboardadmin');


Route::get('/admin/buatakun', [BuatakunController::class, 'showUser'])->name('buatakun.show');
Route::post('/admin/buatakun', [BuatakunController::class, 'store'])->name('buatakun.store');

Route::get('/admin/kelolaakun', function () {
    return view('admin.kelolaakun');
});

Route::get('/admin/editstock', function () {
    return view('admin.editstock');
});