<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PartsController;
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

Route::get('/', [HomeController::class, 'viewHome']);
Route::get('/parts', [PartsController::class, 'getDataParts']);

Route::get('/admin', [AdminController::class, 'viewAdminLogin']);
Route::post('/admin', [AdminController::class, 'processAdminLogin']);
Route::get('/image/{path_image}/{image_name}', [ImageController::class, 'getImage']);

Route::middleware('admin')->group(function(){
    Route::get('/admin/logout', [AdminController::class, 'processAdminLogout']);
    
    Route::get('/admin/dashboard/beranda', [AdminController::class, 'viewDashboardBeranda']);
    
    Route::get('/admin/dashboard/parts', [AdminController::class, 'viewDashboardParts']);
    Route::get('/admin/dashboard/parts/tambah-data', [PartsController::class, 'viewCreateDataParts']);
    Route::post('/admin/dashboard/parts', [PartsController::class, 'createDataParts']);
    
    Route::get('/admin/dashboard/parts/edit-data/{slug}', [PartsController::class, 'viewEditDataParts']);
    Route::patch('/admin/dashboard/parts', [PartsController::class, 'updateDataParts']);

    Route::delete('/admin/dashboard/parts', [PartsController::class, 'deleteDataParts']);
    
    
    Route::get('/admin/dashboard/gallery', [AdminController::class, 'viewDashboardGallery']);
    Route::patch('/admin/dashboard/gallery', [GalleryController::class, 'updateDataGallery']);
});

