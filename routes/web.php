<?php

use App\Http\Controllers\HomeController;
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
Route::post('/searchFlight',[HomeController::class,'searchFlight']);
Route::get('/tour',[HomeController::class,'tour']);
Route::get('/DoBooking',[HomeController::class,'DoBook']);
Route::get('/search',[HomeController::class,'searchFlight']);
/*
Route::prefix('tour')->group(function () {
    Route::get('/imgh/{id}', [HomeController::class, 'showheader']);
    Route::get('/imgt/{id}', [HomeController::class, 'showthumb']);
    // Route::get('/Photo/getimg/{id}', [ProductTourPhotoController::class, 'show']);
    // Route::get('/Thermcond/getFile/{id}', [ProductTourThermcondController::class, 'getFile']);
});
*/
