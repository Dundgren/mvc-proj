<?php

use Illuminate\Support\Facades\Route;
use Dundgren\Http\Controllers\DiceController;
use Dundgren\Http\Controllers\Game21Controller;
use Dundgren\Http\Controllers\BookController;
use Dundgren\Http\Controllers\WinnerController;

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

Route::prefix("game21")->group(function () {
    Route::get("/", [Game21Controller::class, "reset"]);
    Route::post("/start", [Game21Controller::class, "playerRoll"]);
    Route::post("/stop", [Game21Controller::class, "botRoll"]);
    Route::post("/clear", [Game21Controller::class, "clear"]);
});

Route::get("/book", [BookController::class, "getData"]);

Route::get("/winner", [WinnerController::class, "getData"]);
