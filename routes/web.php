<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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

// Route::middleware(['auth', 'verified'])->group(function () {


//     Route::name('user-management.')->group(function () {
//         Route::resource('/user-management/users', UserManagementController::class);
//         Route::resource('/user-management/roles', RoleManagementController::class);
//         Route::resource('/user-management/permissions', PermissionManagementController::class);
//     });

// });

Route::get('/', [DashboardController::class, 'index'])->name('landing');
Route::get('/about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [DashboardController::class, 'contactUs'])->name('contact-us');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::middleware(['web'])->group(function () {
    Route::get('/products/autocomplete', [ProductController::class, 'autocomplete'])->name('products.autocomplete');
    Route::resource('/products', ProductController::class);
// });


Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
