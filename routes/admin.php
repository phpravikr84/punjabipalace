<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\DietaryAttributeController;
use App\Http\Controllers\Backend\UomController;
use App\Http\Controllers\Backend\TableController;
use App\Http\Controllers\Backend\MenuCategoryController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuItemController;
use App\Http\Controllers\Backend\ItemCategoryController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\PurchaseController;


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

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('admin.home');

    //Master Setting
    Route::resource('/companies', CompanyController::class, ['names' => 'companies']);
    Route::resource('/countries', CountryController::class, ['names' => 'countries']);
    Route::resource('/states', StateController::class, ['names' => 'states']);
    Route::resource('/cities', CityController::class, ['names' => 'cities']);
    Route::resource('dietary-attributes', DietaryAttributeController::class, ['names' => 'dietary-attributes']);
    Route::resource('uoms', UomController::class, ['names' => 'uoms']);
    Route::resource('tables', TableController::class, ['names' => 'tables']);

    Route::resource('menu-categories', MenuCategoryController::class, ['names' => 'menu-categories']);
    Route::resource('menus', MenuController::class, ['names' => 'menus']);
    Route::resource('menu-items', MenuItemController::class, ['names' => 'menu-items']);
    Route::resource('item-categories', ItemCategoryController::class, ['names' => 'item-categories']);
    Route::resource('items', ItemController::class, ['names' => 'items']);
    Route::resource('vendors', VendorController::class, ['names' => 'vendors']);
    Route::resource('purchase', PurchaseController::class, ['names' => 'purchase']);



    
    // Category routes
    Route::resource('/category', \App\Http\Controllers\CategoryController::class, ['names' => 'category']);
    // Menu routes
    Route::resource('/menu', \App\Http\Controllers\MenuController::class, ['names' => 'menu']);
    // Service routes
    Route::resource('/service', \App\Http\Controllers\ServiceController::class, ['names' => 'service']);
    // Staff routes
    Route::resource('/staff', \App\Http\Controllers\StaffController::class, ['names' => 'staff']);
    // Blog routes
    Route::resource('/blog', \App\Http\Controllers\BlogController::class, ['names' => 'blog']);
    // Gallery routes
    Route::resource('/gallery', \App\Http\Controllers\GalleryController::class, ['names' => 'gallery']);
    // Slider routes
    Route::resource('/slider', \App\Http\Controllers\SliderController::class, ['names' => 'slider']);
    // Reservation route
    Route::get('/reservation', [App\Http\Controllers\ReserveController::class, 'index'])->name('admin.reserve');
    Route::get('/reservation/{type}/{reserve}', [App\Http\Controllers\ReserveController::class, 'confirmation'])->name('admin.reserve.confirmation');
    Route::delete('/reservation/{reserve}', [App\Http\Controllers\ReserveController::class, 'delete'])->name('admin.reserve.delete');
    // Order route
    Route::get('/order', [App\Http\Controllers\OrderShowController::class, 'index'])->name('admin.order');
    Route::get('/order/{type}/{order}', [App\Http\Controllers\OrderShowController::class, 'confirmation'])->name('admin.order.confirmation');
    Route::delete('/order/{order}', [App\Http\Controllers\OrderShowController::class, 'delete'])->name('admin.order.delete');
    //General routes
    Route::get('/general', [App\Http\Controllers\GeneralController::class, 'index'])->name('admin.general');
    Route::put('/general/{type}', [App\Http\Controllers\GeneralController::class, 'store'])->name('admin.general.store');
});

