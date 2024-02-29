<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminAuthController;
use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/**General user routes **/
Route::middleware(['generalUserAuth'])->get('/dashboard', [DashboardController::class, 'generalUserDashboard'])->name('dashboard');

/**Admin routes **/
Route::middleware('adminAuth')->prefix('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboardShow');
});

Route::prefix('admin')->group(function(){
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
});

/**Super Admin routes **/
Route::middleware('superAdminAuth')->prefix('superAdmin')->group(function(){
    
    Route::get('/dashboard', [SuperAdminDashboardController::class, 'superAdminDashboard'])->name('superAdminDashboardShow');
    
    // create a new user form
    Route::get('/user/create', [UserController::class, 'createForm'])->name('createUser'); 
    // create a new user POST
    Route::post('/user/create', [UserController::class, 'create']);
    
    // delete the user
    Route::delete('/user/{user}', [UserController::class, 'delete'])->name('deleteUser');
    
    //get the update user form
    Route::get('/user/{user}', [UserController::class, 'updateForm'])->name('updateUser'); 
    //update the user data POST
    Route::post('/user/{user}', [UserController::class, 'update']);
    
});

Route::prefix('superAdmin')->group(function(){
    Route::post('/logout', [SuperAdminAuthController::class, 'superAdminLogout'])->name('superAdminLogout');
});