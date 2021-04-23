<?php

use Illuminate\Support\Facades\Route;
use Dundgren\Http\Controllers\DiceController;
use Dundgren\Http\Controllers\Game21Controller;

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
    return view("posts.index");
});

Route::get("/dice", [DiceController::class, "roll"]);

Route::prefix("game21")->group(function() {
    Route::post("/start", [Game21Controller::class, "playerRoll"]);
    Route::post("/stop", [Game21Controller::class, "botRoll"]);
    Route::get("/", [Game21Controller::class, "reset"]);
    Route::post("/clear", [Game21Controller::class, "clear"]);
});




