<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\admin\AdminController;
use App\Http\Controllers\Api\admin\MenuController;

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
    Route::get('/dietary-attributes', [MenuController::class, 'listDietaryAttributes']);
    // Create a new dietary attribute
    Route::post('/dietary-attributes', [MenuController::class, 'addDietaryAttribute']);
    // Update an existing dietary attribute
    Route::put('/dietary-attributes/{id}', [MenuController::class, 'updateDietaryAttribute']);
    // Delete a dietary attribute
    Route::delete('/dietary-attributes/{id}', [MenuController::class, 'deleteDietaryAttribute']);


    // Get all dietary labels
    Route::get('dietary-labels', [MenuController::class, 'listDietaryLabels']);
    // Create a new dietary label
    Route::post('dietary-labels', [MenuController::class, 'addDietaryLabel']);
    // Update an existing dietary label
    Route::put('dietary-labels/{id}', [MenuController::class, 'updateDietaryLabel']);
    // Delete a dietary label
    Route::delete('dietary-labels/{id}', [MenuController::class, 'deleteDietaryLabel']);


     // Get all currencies
     Route::get('/currencies', [MenuController::class, 'listCurrency']);
     // Create a new dietary attribute
     Route::post('/currencies', [MenuController::class, 'addCurrency']);
     // Update an existing dietary attribute
     Route::put('/currencies/{id}', [MenuController::class, 'updateCurrency']);
     // Delete a dietary attribute
     Route::delete('/currencies/{id}', [MenuController::class, 'deleteCurrency']);

// Routes for Admin API
Route::prefix('admin/auth')->group(function () {
    Route::post('login', [AdminController::class, 'login']);
    Route::post('change-password', [AdminController::class, 'changepassword'])->middleware('auth:api');
    Route::post('reset-password/{token}', [AdminController::class, 'resetPassword']);
    Route::post('forgot-password', [AdminController::class, 'forgotPassword']);
});
