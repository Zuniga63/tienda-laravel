<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\RolHasMenuController;
use App\Http\Controllers\StartController;
use App\Models\Admin\RolHasMenu;

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
  // ---------------------------------------------------
  // Rutas para la gestion de los roles
  // ---------------------------------------------------
  Route::get('rol', [RolController::class, 'index'])->name('rol');
  Route::get('rol/crear', [RolController::class, 'create'])->name('create_rol');
  Route::post('rol', [RolController::class, 'store'])->name('store_rol');
  Route::get('rol/{id}/editar', [RolController::class, 'edit'])->name('edit_rol');
  Route::put('rol/{id}', [RolController::class, 'update'])->name('update_rol');
  Route::delete('rol/{id}', [RolController::class, 'destroy'])->name('delete_rol');
  // ---------------------------------------------------
  // Rutas para la asignacion de menus a los roles
  // ---------------------------------------------------
  Route::get('menu-rol', [RolHasMenuController::class, 'index'])->name('menu-rol');
  Route::post('menu-rol', [RolHasMenuController::class, 'store'])->name('store_menu_rol');
});
