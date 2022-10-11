<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductTourController;
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

Route::get('/', [HomeController::class,'home']);
Route::get('/tour',[HomeController::class,'tour']);
Route::get('/DoBooking',[HomeController::class,'DoBook']);
Route::prefix('Flight')->group(function () {
    Route::post('/search',[HomeController::class,'searchFlight']);
    Route::post('/searchFlight',[HomeController::class,'searchFlight']);

});
Route::prefix('tour')->group(function () {
    Route::get('quote/{productTour:id}',[productTourController::class,'quote']);
    Route::get('/{productTour:slug}', [ProductTourController::class, 'show']);
    Route::get('/imgh/{id}', [HomeController::class, 'showheader']);
    Route::get('/imgt/{id}', [HomeController::class, 'showthumb']);
    Route::prefix('Photo')->group(function () {
        Route::get('/getall/{id}', [ProductTourController::class, 'showAllPhoto']);
        Route::get('/getimg/{id}', [ProductTourController::class, 'showPhoto']);
    });
    // Route::post('/search', [ProductTourController::class, 'search']);
    // Route::post('/all', [ProductTourController::class, 'showPaginate']);
    // Route::post('/showcountry', [ProductTourController::class, 'showbyCountry']);
    // Route::post('availDate',[ProductTourController::class, 'availDate']);
});

Route::prefix('tour')->group(function () {
    // Route::get('/Thermcond/getFile/{id}', [ProductTourThermcondController::class, 'getFile']);
});

Route::get('/backoffice/tour',[HomeController::class,'adminTour']);
