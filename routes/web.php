<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/profil', [AdminController::class, 'profilpage'])->name('admin/profil_admin');
});

Route::middleware(['auth', 'role:merchant'])->group(function () {
    Route::get('/merchant/home', [HomeController::class, 'merchantHome'])->name('merchant/home');

    Route::get('/merchant/profil', [MerchantController::class, 'profilpage'])->name('merchant/profil_merchant');
    Route::put('/merchant/profil', [MerchantController::class, 'updateProfil'])->name('merchant.updateProfil');
    Route::resource('menus', MenuController::class)->middleware('auth');
    Route::get('/merchant/menu', [MenuController::class, 'index'])->name('merchant/menu');
    Route::get('/merchant/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/merchant/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/merchant/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/merchant/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/merchant/menu/destroy/{id}', [MenuController::class, 'destroy'])->name('menu.delete');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', [HomeController::class, 'customerHome'])->name('customer.dashboard');
});

