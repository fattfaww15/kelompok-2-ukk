<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\AdminController;

Route::get('/', [GudangController::class, 'index'])->name('home');
Route::get('gudang', [GudangController::class, 'index'])->name('gudang.index');
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('admin/barang/create', [AdminController::class, 'createBarang'])->name('admin.barang.create');
Route::get('admin/barang/{barang}/edit', [AdminController::class, 'editBarang'])->name('admin.barang.edit');
Route::post('admin/barang', [AdminController::class, 'storeBarang'])->name('admin.barang.store');
Route::put('admin/barang/{barang}', [AdminController::class, 'updateBarang'])->name('admin.barang.update');
Route::delete('admin/barang/{barang}', [AdminController::class, 'destroyBarang'])->name('admin.barang.destroy');

Route::get('admin/supplier/create', [AdminController::class, 'createSupplier'])->name('admin.supplier.create');
Route::get('admin/supplier/{supplier}/edit', [AdminController::class, 'editSupplier'])->name('admin.supplier.edit');
Route::post('admin/supplier', [AdminController::class, 'storeSupplier'])->name('admin.supplier.store');
Route::put('admin/supplier/{supplier}', [AdminController::class, 'updateSupplier'])->name('admin.supplier.update');
Route::delete('admin/supplier/{supplier}', [AdminController::class, 'destroySupplier'])->name('admin.supplier.destroy');

Route::get('admin/gerai', [AdminController::class, 'indexGerai'])->name('admin.gerai.index');
Route::get('admin/gerai/create', [AdminController::class, 'createGerai'])->name('admin.gerai.create');
Route::get('admin/gerai/{gerai}/edit', [AdminController::class, 'editGerai'])->name('admin.gerai.edit');
Route::post('admin/gerai', [AdminController::class, 'storeGerai'])->name('admin.gerai.store');
Route::put('admin/gerai/{gerai}', [AdminController::class, 'updateGerai'])->name('admin.gerai.update');
Route::delete('admin/gerai/{gerai}', [AdminController::class, 'destroyGerai'])->name('admin.gerai.destroy');

Route::resource('barang', BarangController::class);