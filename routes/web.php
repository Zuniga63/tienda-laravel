<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\StartController;

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

Route::get('/', [StartController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'admin'], function () {
  // ---------------------------------------------------
  // Rutas para la gestion de los permisos
  // ---------------------------------------------------
  Route::get('permiso', [PermissionController::class, 'index'])->name('permission');
  // ---------------------------------------------------
  // Rutas para la gestion de los menus
  // ---------------------------------------------------
  Route::get('menu', [MenuController::class, 'index'])->name('menu');
  Route::get('menu/crear', [MenuController::class, 'create'])->name('create_menu');
  Route::post('menu', [MenuController::class, 'store'])->name('store_menu');
  Route::post('menu/guardar-orden', [MenuController::class, 'saveOrder'])->name('save_order');
});
