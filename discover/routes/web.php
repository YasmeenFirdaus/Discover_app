<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VahiniController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\SubAdminComplaintsController;
use App\Http\Controllers\SubAdminController;

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

Route::get('/', function () {
    return view('welcome');
});




    Route::prefix('admin')->group(function () {
        // Login
        Route::get('/login', [AdminController::class, 'Index'])->name('admin.login');
        Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');
        Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.logindata');

        // To display add API form page (both web and API)
        Route::get('/adminApi', [ApiController::class, 'create'])->name('admin.addapi');

        // To submit the data to the database (both web and API)
        Route::post('/AddNewApi', [ApiController::class, 'Newapi'])->name('admin.AddNewApi');

        // // To show data in API Data Page (both web and API)
        // Route::get('/adminApiData', [ApiDataController::class, 'fetchDataAndDisplay'])->name('admin.apidata');
        // Inside your web.php or api.php routes file
        Route::get('/adminApiData', [ApiDataController::class, 'fetchDataAndDisplay'])
        ->name('admin.apidata');


        // Dashboard (common route for both web and API)
        Route::match(['get', 'post'], '/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('Adminauthcheck');
    
});

