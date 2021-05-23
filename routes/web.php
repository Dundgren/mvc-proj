<?php

use Illuminate\Support\Facades\Route;
use Dundgren\Http\Controllers\Game21Controller;
use Dundgren\Http\Controllers\ScoretableController;
use Dundgren\Http\Controllers\GamesPlayedController;

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

Route::prefix("game21")->group(function () {
    Route::get("/", [Game21Controller::class, "reset"]);
    Route::post("/start", [Game21Controller::class, "playerRoll"]);
    Route::post("/stop", [Game21Controller::class, "botRoll"]);
    Route::post("/clear", [Game21Controller::class, "clear"]);
});

Route::get("/games-played", [GamesPlayedController::class, "getData"]);

Route::get("/scoretable", [ScoretableController::class, "getData"]);
