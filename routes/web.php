<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\Home\IndexController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\Home\IndexController::class, 'contact'])->name('contact');
Route::get('wisata', [App\Http\Controllers\Home\IndexController::class, 'wisata'])->name('home.wisata');
Route::get('geojson', [App\Http\Controllers\Home\IndexController::class, 'geojson'])->name('home.geojson');
Route::redirect('berita', '/');
Route::get('berita/{slug_url}', [App\Http\Controllers\Home\IndexController::class, 'baca'])->name('home.berita.baca');

Route::group(['middleware' => ['auth', 'role:admin', 'dontback']], function () {
    Route::prefix('admin')->group(static function () {
        Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin');
        Route::get('dawis', [App\Http\Controllers\Data\KeluargaController::class, 'index'])->name('keluarga');
        Route::post('dawis', [App\Http\Controllers\Data\KeluargaController::class, 'store'])->name('keluarga.store');
        // add kk
        Route::get('dawis/{id}/view', [App\Http\Controllers\Data\KeluargaController::class, 'show'])->name('keluarga.view');
        Route::post('dawis/{id}/view', [App\Http\Controllers\Data\KeluargaController::class, 'store_kk'])->name('keluarga.store_kk');
        Route::delete('dawis/{id}/delete', [App\Http\Controllers\Data\KeluargaController::class, 'destroy'])->name('keluarga.destroy');
        Route::delete('dawis/{id}/hapus', [App\Http\Controllers\Data\KeluargaController::class, 'hapus_kk'])->name('keluarga.hapus_kk');

        // komoditi
        Route::post('dawis/{id}/komoditi', [App\Http\Controllers\Data\KeluargaController::class, 'komoditi'])->name('keluarga.komoditi');

        // data pdf
        Route::get('keluarga/{id}/pdf', [App\Http\Controllers\Pdf\KeluargaController::class, 'index'])->name('keluarga.pdf');

        // wisata desa
        Route::resource('wisata', '\App\Http\Controllers\Desa\WisataController');
        Route::resource('info', '\App\Http\Controllers\Desa\InfoController');
        Route::resource('kontak', '\App\Http\Controllers\Data\SuratController');

        // user management
        Route::resource('user', '\App\Http\Controllers\Data\UserController');
        // RT Management
        Route::resource('rt', '\App\Http\Controllers\Desa\RtController');
        // rw Management
        Route::resource('rw', '\App\Http\Controllers\Desa\RwController');
    });
});

Route::group(['middleware' => ['auth', 'role:rw,admin', 'dontback']], function () {
    Route::prefix('rw')->group(static function () {
        Route::get('/', [App\Http\Controllers\Role\RwController::class, 'index'])->name('role.rw');
        Route::get('rekap-rw', [App\Http\Controllers\Role\RwController::class, 'rekap'])->name('rekap.rw');
        Route::get('rekap-pdf', [App\Http\Controllers\Pdf\RekapController::class, 'index_rw'])->name('rw.rekap.pdf');

        // dawis
        Route::get('dawis', [App\Http\Controllers\Role\RwController::class, 'dawis'])->name('rw.keluarga');
        Route::post('dawis', [App\Http\Controllers\Role\RwController::class, 'store'])->name('rw.keluarga.store');
        // add kk
        Route::get('dawis/{id}/view', [App\Http\Controllers\Role\RwController::class, 'show'])->name('rw.keluarga.view');
        Route::post('dawis/{id}/view', [App\Http\Controllers\Role\RwController::class, 'store_kk'])->name('rw.keluarga.store_kk');
        Route::delete('dawis/{id}/delete', [App\Http\Controllers\Role\RwController::class, 'destroy'])->name('rw.keluarga.destroy');
        Route::delete('dawis/{id}/hapus', [App\Http\Controllers\Role\RwController::class, 'hapus_kk'])->name('rw.keluarga.hapus_kk');

        // komoditi
        Route::post('dawis/{id}/komoditi', [App\Http\Controllers\Role\RwController::class, 'komoditi'])->name('rw.keluarga.komoditi');
        // data pdf
        Route::get('keluarga/{id}/pdf', [App\Http\Controllers\Pdf\KeluargaController::class, 'index'])->name('rw.keluarga.pdf');
    });
});



Route::group(['middleware' => ['auth', 'role:rt,admin', 'dontback']], function () {
    Route::prefix('rt')->group(static function () {
        Route::get('/', [App\Http\Controllers\Role\RtController::class, 'index'])->name('role.rt');
        Route::get('rekap-rt', [App\Http\Controllers\Role\RtController::class, 'rekap'])->name('rekap.rt');
        Route::get('rekap-pdf', [App\Http\Controllers\Pdf\RekapController::class, 'index_rt'])->name('rt.rekap.pdf');

        // dawis
        Route::get('dawis', [App\Http\Controllers\Role\RtController::class, 'dawis'])->name('rt.keluarga');
        Route::post('dawis', [App\Http\Controllers\Role\RtController::class, 'store'])->name('rt.keluarga.store');
        // add kk
        Route::get('dawis/{id}/view', [App\Http\Controllers\Role\RtController::class, 'show'])->name('rt.keluarga.view');
        Route::post('dawis/{id}/view', [App\Http\Controllers\Role\RtController::class, 'store_kk'])->name('rt.keluarga.store_kk');
        Route::delete('dawis/{id}/delete', [App\Http\Controllers\Role\RtController::class, 'destroy'])->name('rt.keluarga.destroy');
        Route::delete('dawis/{id}/hapus', [App\Http\Controllers\Role\RtController::class, 'hapus_kk'])->name('rt.keluarga.hapus_kk');
        // komoditi
        Route::post('dawis/{id}/komoditi', [App\Http\Controllers\Role\RtController::class, 'komoditi'])->name('rt.keluarga.komoditi');
        // data pdf
        Route::get('keluarga/{id}/pdf', [App\Http\Controllers\Pdf\KeluargaController::class, 'index'])->name('rt.keluarga.pdf');
    });

    Route::group(['middleware' => ['auth', 'dontback']], function () {
        // profile change and password
        Route::get('profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');
        Route::post('profile', [App\Http\Controllers\User\ProfileController::class, 'change'])->name('profile.change');
        Route::get('password', [App\Http\Controllers\User\ProfileController::class, 'sandi'])->name('profile.password');
        Route::post('password', [App\Http\Controllers\User\ProfileController::class, 'store'])->name('profile.store');
    });
});
