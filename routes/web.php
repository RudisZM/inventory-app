<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlowOfGoodsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\GoodsFlowController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ##LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.auth')->middleware('guest');

// ##LOGOUT
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// ##DASHBOARD
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// ##GOODS - GET
Route::get('/daftar-barang', [GoodsController::class, 'index'])->name('goods')->middleware('auth');
Route::get('/barang/show/{id}', [GoodsController::class, 'goodsShow'])->name('goods.show')->middleware('auth');
Route::get('/place/{id}', [GoodsController::class, 'getArea'])->name('place')->middleware('auth');
Route::get('/area/{id}', [GoodsController::class, 'getRak'])->name('area')->middleware('auth');
Route::get('/rak/{id}', [GoodsController::class, 'getShap'])->name('rak')->middleware('auth');

// ##GOODS - POST
Route::post('/barang-store', [GoodsController::class, 'store'])->name('goods.store')->middleware('auth');
Route::post('/barang-update-price/{id}', [GoodsController::class, 'updatePrice'])->name('goods.update.price')->middleware('auth');
Route::post('/barang-update-location/{id}', [GoodsController::class, 'updateLocation'])->name('goods.update.location')->middleware('auth');
Route::post('/barang-update-location-asset/{id}', [GoodsController::class, 'updateLocationAsset'])->name('goods.update.location.asset')->middleware('auth');
Route::post('/barang-add-new-location/{id}', [GoodsController::class, 'addNewLocation'])->name('goods.add.new.location')->middleware('auth');
Route::post('/barang-update-location-image/{id}', [GoodsController::class, 'updateLocationImage'])->name('goods.update.location.image')->middleware('auth');
Route::post('/barang-update-location-stock/{id}', [GoodsController::class, 'updateLocationStock'])->name('goods.update.location.stock')->middleware('auth');
Route::post('/barang-update-stock-asset/{id}', [GoodsController::class, 'updateStockAsset'])->name('goods.update.stock.asset')->middleware('auth');
Route::post('/barang-update-image/{id}', [GoodsController::class, 'updateImage'])->name('goods.update.image')->middleware('auth');
Route::post('/barang-update-data/{id}', [GoodsController::class, 'updateData'])->name('goods.update.data')->middleware('auth');
Route::post('/barang-remove-tag', [GoodsController::class, 'removeTag'])->name('goods.remove.tag')->middleware('auth');
Route::post('/barang-create-outbound/{id}', [GoodsController::class, 'createOutbound'])->name('goods.create.outbound')->middleware('auth');
Route::post('/barang-create-inbound/{id}', [GoodsController::class, 'createInbound'])->name('goods.create.inbound')->middleware('auth');
Route::post('/barang-split-stock/{id}', [GoodsController::class, 'splitStock'])->name('goods.split.stock')->middleware('auth');
Route::post('/barang-create-asset/{id}', [GoodsController::class, 'createAsset'])->name('goods.create.asset')->middleware('auth');
Route::delete('/barang-hapus/{id}', [GoodsController::class, 'destroy'])->name('goods.destroy')->middleware('auth');
Route::delete('/barang-hapus-massal', [GoodsController::class, 'massDestroy'])->name('goods.mass.destroy')->middleware('auth');
Route::delete('/barang-inventory-hapus/{id}', [GoodsController::class, 'inventoryDestroy'])->name('inventory.destroy')->middleware('auth');
Route::get('/goodsflow/export/excel', [GoodsController::class, 'exportExcel'])->name('goods.export.excel')->middleware('auth');

// ##FLOWOFGOODS
Route::post('/perpanjang-peminjaman-barang/{id}', [FlowOfGoodsController::class, 'hanging'])->name('hanging.goods')->middleware('auth');
Route::post('/pengembalian-barang-pinjaman/{id}', [FlowOfGoodsController::class, 'goodsReturn'])->name('goods.return')->middleware('auth');

// ##GOODS - IMPORT
Route::post('/import-goods', [GoodsController::class, 'importCsv'])->name('goods.import')->middleware('auth');

// #PLACEMENT
Route::post('/new-placement', [PlacementController::class, 'newPlacement'])->name('new.placement')->middleware('auth');

// ##ATTACHMENT
Route::get('/attachments', [AttachmentController::class, 'index'])->name('attachments')->middleware('auth');
Route::post('/attachment-store', [AttachmentController::class, 'store'])->name('attachment.store')->middleware('auth');

// ##GOODSFLOW
Route::get('/goodsflow', [GoodsFlowController::class, 'index'])->name('goods.flow')->middleware('auth');
Route::post('/goodsflow', [GoodsFlowController::class, 'filterDate'])->name('goods.flow.filter.date')->middleware('auth');
Route::post('/goodsflow/update/{id}', [GoodsFlowController::class, 'update'])->name('goods.flow.update.data')->middleware('auth');
Route::delete('/goodsflow/destroy/{id}', [GoodsFlowController::class, 'destroy'])->name('goods.flow.destroy')->middleware('auth');
Route::get('/goodsflow/export', [GoodsFlowController::class, 'exportExcel'])->name('flow.export.excel')->middleware('auth');

// ##SETTINGS
Route::get('/tambah-user', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::post('/save-user', [UserController::class, 'store'])->name('user.store')->middleware('auth');
