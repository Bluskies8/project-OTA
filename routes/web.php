<?php

use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductTourController;
use App\Http\Controllers\ProductTourCountrytagController;
use App\Http\Controllers\ProductTourExcludeController;
use App\Http\Controllers\ProductTourHighlightController;
use App\Http\Controllers\ProductTourIncludeController;
use App\Http\Controllers\ProductTourItinenaryController;
use App\Http\Controllers\ProductTourPassGroupController;
use App\Http\Controllers\ProductTourPhotoController;
use App\Http\Controllers\ProductTourThermcondController;
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
Route::post('/setCookie', [HomeController::class,'setCookie']);
Route::get('/tour',[HomeController::class,'tour']);
Route::get('/datadiri',[HomeController::class,'datadiri']);
// Route::get('/DoBooking',[HomeController::class,'DoBook']);
Route::prefix('Flight')->group(function () {
    Route::post('/search',[HomeController::class,'searchFlight']);
    Route::get('/searchFlight2',[HomeController::class,'searchFlight2']);
    Route::post('/book',[FlightController::class,'']);
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

Route::prefix('cms')->group(function () {
    Route::prefix('bulk')->group(function () {
        Route::post('tour',[ProductTourController::class,'bulk']);
        // Route::post('event',[EventController::class,'bulk']);
        // Route::post('user',[UserController::class,'upgradetoCorp']);
        // Route::post('promo',[PromoController::class,'bulk']);
    });
    Route::prefix('tour')->group(function () {
        Route::get('/',[BackofficeController::class,'showAlltour']);
        // Route::get('/Thermcond/getFile/{id}', [ProductTourThermcondController::class, 'getFile']);
        Route::get('/{productTour:slug}', [ProductTourController::class, 'showbyId']);
        Route::post('/create',[ProductTourController::class,'create']);
        Route::post('/update',[ProductTourController::class,'update']);
        // Route::prefix('CancelPolicy')->group(function () {
        //     Route::post('create', [ProductTourCancelpolicyController::class, 'create']);
        //     Route::get('/get/{id}', [ProductTourCancelpolicyController::class, 'show']);
        //     Route::get('/trash', [ProductTourCancelpolicyController::class, 'getTrash']);
        //     Route::post('update', [ProductTourCancelpolicyController::class, 'update']);
        //     Route::delete('delete/{id}', [ProductTourCancelpolicyController::class, 'destroy']);
        //     Route::patch('restore/{id}', [ProductTourCancelpolicyController::class, 'restore']);
        // });
        Route::prefix('CountryTag')->group(function () {
            Route::post('create', [ProductTourCountrytagController::class, 'create']);
            Route::get('/get/{id}', [ProductTourCountrytagController::class, 'show']);
            Route::get('/trash', [ProductTourCountrytagController::class, 'getTrash']);
            Route::post('update', [ProductTourCountrytagController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourCountrytagController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourCountrytagController::class, 'restore']);
        });
        Route::prefix('Exclude')->group(function () {
            Route::post('create', [ProductTourExcludeController::class, 'create']);
            Route::get('/get/{id}', [ProductTourExcludeController::class, 'show']);
            Route::get('/getAll/{id}', [ProductTourExcludeController::class, 'showAll']);
            Route::get('/trash', [ProductTourExcludeController::class, 'getTrash']);
            Route::post('update/{id}', [ProductTourExcludeController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourExcludeController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourExcludeController::class, 'restore']);
        });
        Route::prefix('Include')->group(function () {
            Route::post('create', [ProductTourIncludeController::class, 'create']);
            Route::get('/get/{id}', [ProductTourIncludeController::class, 'show']);
            Route::get('/getAll/{id}', [ProductTourIncludeController::class, 'showAll']);
            Route::get('/trash', [ProductTourIncludeController::class, 'getTrash']);
            Route::post('update/{id}', [ProductTourIncludeController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourIncludeController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourIncludeController::class, 'restore']);
        });
        Route::prefix('Highlight')->group(function () {
            Route::post('create', [ProductTourHighlightController::class, 'create']);
            Route::get('/get/{id}', [ProductTourHighlightController::class, 'show']);
            Route::get('/getAll/{id}', [ProductTourHighlightController::class, 'showAll']);
            Route::get('/trash', [ProductTourHighlightController::class, 'getTrash']);
            Route::post('update/{id}', [ProductTourHighlightController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourHighlightController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourHighlightController::class, 'restore']);
        });
        Route::prefix('Itinetary')->group(function () {
            Route::post('create', [ProductTourItinenaryController::class, 'create']);
            Route::get('/get/{id}', [ProductTourItinenaryController::class, 'show']);
            Route::get('getAll/{id}', [ProductTourItinenaryController::class, 'showAll']);
            // Route::get('/getAll/{id}', [ProductTourItinenaryController::class, 'showAll']);
            Route::get('/trash', [ProductTourItinenaryController::class, 'getTrash']);
            Route::post('update/{id}', [ProductTourItinenaryController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourItinenaryController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourItinenaryController::class, 'restore']);
        });
        Route::prefix('Passgroup')->group(function () {
            Route::post('create', [ProductTourPassGroupController::class, 'create']);
            Route::get('/getall/{id}', [ProductTourPassGroupController::class, 'showAll']);
            Route::get('/get/{id}', [ProductTourPassGroupController::class, 'show']);
            Route::get('/trash', [ProductTourPassGroupController::class, 'getTrash']);
            Route::post('update', [ProductTourPassGroupController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourPassGroupController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourPassGroupController::class, 'restore']);
        });
        Route::prefix('Photo')->group(function () {
            Route::post('create', [ProductTourPhotoController::class, 'create']);
            Route::get('/getall/{id}', [ProductTourPhotoController::class, 'showAll']);
            Route::get('/getimg/{id}', [ProductTourPhotoController::class, 'show']);
            Route::get('/trash', [ProductTourPhotoController::class, 'getTrash']);
            Route::post('update/', [ProductTourPhotoController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourPhotoController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourPhotoController::class, 'restore']);
        });
        Route::prefix('Thermcond')->group(function () {
            Route::post('create', [ProductTourThermcondController::class, 'create']);
            Route::get('/get/{id}', [ProductTourThermcondController::class, 'show']);
            Route::get('/getFile/{id}', [ProductTourThermcondController::class, 'getFile']);
            Route::get('/trash', [ProductTourThermcondController::class, 'getTrash']);
            Route::post('update', [ProductTourThermcondController::class, 'update']);
            Route::delete('delete/{id}', [ProductTourThermcondController::class, 'destroy']);
            Route::patch('restore/{id}', [ProductTourThermcondController::class, 'restore']);
        });
        // Route::prefix('Passanger')->group(function () {
        //     Route::post('create', [TourPassangerController::class, 'create']);
        //     Route::get('/get/{id}', [TourPassangerController::class, 'show']);
        //     Route::get('/trash', [TourPassangerController::class, 'getTrash']);
        //     Route::post('update', [TourPassangerController::class, 'update']);
        //     Route::delete('delete/{id}', [TourPassangerController::class, 'destroy']);
        //     Route::patch('restore/{id}', [TourPassangerController::class, 'restore']);
        // });
    });
});

