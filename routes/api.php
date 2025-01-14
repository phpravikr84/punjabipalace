<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\admin\AdminController;
use App\Http\Controllers\Api\admin\MenuController;
use App\Http\Controllers\Api\admin\MasterController;

// Handle CORS in middleware, not directly in the route file
// Move CORS headers to middleware if needed

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Routes for User
Route::post('login', [AdminController::class, 'login']);
    /**
     *  APIs for Menu Mananagment
     */
    // Get all categories
    Route::get('categories', [MenuController::class, 'getCategories']);
    // Create a new category
    Route::post('categories', [MenuController::class, 'createCategory']);
    // Update an existing category
    Route::put('categories/{id}', [MenuController::class, 'updateCategory']);
    // Delete a category
    Route::delete('categories/{id}', [MenuController::class, 'deleteCategory']);
    // Get all menus by category
    Route::get('menus', [MenuController::class, 'getMenus']);
    // Create a new menu
    Route::post('menus', [MenuController::class, 'createMenu']);
    // Update an existing menu
    Route::put('menus/{id}', [MenuController::class, 'updateMenu']);
    // Delete a menu
    Route::delete('menus/{id}', [MenuController::class, 'deleteMenu']);
    // Menu Items All or By Id
    Route::get('menu-items', [MenuController::class, 'getMenuItems']);
    // Create a new menu item
    Route::post('menu-items', [MenuController::class, 'addMenuItem']);
    // Update an existing menu item
    Route::put('menu-items/{id}', [MenuController::class, 'updateMenuItem']);
    // Delete a menu item
    Route::delete('menu-items/{id}', [MenuController::class, 'deleteMenuItem']);
    // Get all customization options by menu item ID
    Route::get('customization-options', [MenuController::class, 'listCustomizationOptions']);
    // Create a new customization option
    Route::post('customization-options', [MenuController::class, 'addCustomizationOption']);
    // Update an existing customization option
    Route::put('customization-options/{id}', [MenuController::class, 'updateCustomizationOption']);
    // Delete a customization option
    Route::delete('customization-options/{id}', [MenuController::class, 'deleteCustomizationOption']);
    // Get all dietary attributes
    Route::get('/dietary-attributes', [MasterController::class, 'listDietaryAttributes']);
    // Create a new dietary attribute
    Route::post('/dietary-attributes', [MasterController::class, 'addDietaryAttribute']);
    // Update an existing dietary attribute
    Route::put('/dietary-attributes/{id}', [MasterController::class, 'updateDietaryAttribute']);
    // Delete a dietary attribute
    Route::delete('/dietary-attributes/{id}', [MasterController::class, 'deleteDietaryAttribute']);

    // Get all dietary labels
    Route::get('dietary-labels', [MenuController::class, 'listDietaryLabels']);
    // Create a new dietary label
    Route::post('dietary-labels', [MenuController::class, 'addDietaryLabel']);
    // Update an existing dietary label
    Route::put('dietary-labels/{id}', [MenuController::class, 'updateDietaryLabel']);
    // Delete a dietary label
    Route::delete('dietary-labels/{id}', [MenuController::class, 'deleteDietaryLabel']);

     // Get all currencies
     Route::get('/currencies', [MasterController::class, 'listCurrency']);
     // Create a new dietary attribute
     Route::post('/currencies', [MasterController::class, 'addCurrency']);
     // Update an existing dietary attribute
     Route::put('/currencies/{id}', [MasterController::class, 'updateCurrency']);
     // Delete a dietary attribute
     Route::delete('/currencies/{id}', [MasterController::class, 'deleteCurrency']);

    // Get all Unit of Materials (UOM)
    Route::get('/uoms', [MasterController::class, 'listCurrency']);
    // Create a new uom
    Route::post('/uoms', [MaterController::class, 'addCurrency']);
    // Update an existing uom
    Route::put('/uoms/{id}', [MasterController::class, 'updateCurrency']);
    // Delete a uom
    Route::delete('/uoms/{id}', [MasterController::class, 'deleteCurrency']);

     // List all stock item categories
     Route::get('/stock-item-categories', [MasterController::class, 'getStockItemCategories']);
     // Create a new stock item category
     Route::post('/stock-item-categories', [MasterController::class, 'createStockItemCategory']);
     // Update an existing stock item category
     Route::put('/stock-item-categories/{id}', [MasterController::class, 'updateStockItemCategory']);
     // Delete a stock item category
     Route::delete('/stock-item-categories/{id}', [MasterController::class, 'deleteStockItemCategory']);



// Routes for Admin API
Route::prefix('admin/auth')->group(function () {
    Route::post('login', [AdminController::class, 'login']);
    Route::post('change-password', [AdminController::class, 'changepassword'])->middleware('auth:api');
    Route::post('reset-password/{token}', [AdminController::class, 'resetPassword']);
    Route::post('forgot-password', [AdminController::class, 'forgotPassword']);
});
