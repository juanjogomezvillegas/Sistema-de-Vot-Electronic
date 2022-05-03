<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Dashboard Items
Route::get('/count-votes', [CandidateController::class, 'countVotes']);

Route::get('/count-candidates', [CandidateController::class, 'countCandidates']);

Route::get('/count-seats', [ConfigurationController::class, 'countSeats']);

Route::get('/count-users', [UserController::class, 'countUsers']);

Route::get('/count-messages', [MessageController::class, 'countMessages']);
