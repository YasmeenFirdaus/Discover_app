<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiDataController;

// To show data in API Data Page 
// Assuming this is in web.php or api.php
Route::get('/adminApiData/{category?}', [ApiDataController::class, 'fetchDataAndDisplay']);
Route::post("register",[Controller::class,"register"]);
Route::post("login",[Controller::class,"login"]);
Route::group([
    "middleware" => ["auth:api"]
], function(){
    Route::get("profile",[Controller::class,"profile"]);
    Route::get("logout",[Controller::class,"logout"]);
});

// Data view
Route::get('/ApiData/{category}', [ApiDataController::class, 'DataView']);

// Category view
Route::get('/ApiCategory', [ApiDataController::class, 'CategoryView']);


