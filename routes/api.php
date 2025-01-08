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
Route::get('categories', [MenuController::class, 'getCategories']);
Route::get('menus', [MenuController::class, 'getMenus']);
// Routes for Admin API
Route::prefix('admin/auth')->group(function () {
    Route::post('login', [AdminController::class, 'login']);
    Route::post('change-password', [AdminController::class, 'changepassword'])->middleware('auth:api');
    Route::post('reset-password/{token}', [AdminController::class, 'resetPassword']);
    Route::post('forgot-password', [AdminController::class, 'forgotPassword']);
});
