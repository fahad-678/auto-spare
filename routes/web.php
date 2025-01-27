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


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::resource('/products', ProductController::class)->except(['index', 'show']);
    Route::resource('/category', ProductController::class)->except(['index', 'show']);
});

Route::middleware(['web'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('landing');
    Route::get('/globalSearch', [DashboardController::class, 'globalSearch'])->name('dashboard.globalSearch');

    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');
    Route::resource('/category', CategoryController::class)->only(['index', 'show']);

    Route::get('/about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
    Route::get('/contact-us', [DashboardController::class, 'contactUs'])->name('contact-us');
});



Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
