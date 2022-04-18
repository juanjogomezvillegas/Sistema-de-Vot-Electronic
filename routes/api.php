<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\LawController;

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

//Dashboard Items
Route::get('/count-votes', [CandidateController::class, 'countVotes']);

Route::get('/count-candidates', [CandidateController::class, 'countCandidates']);

Route::get('/count-seats', [ConfigurationController::class, 'countSeats']);

Route::get('/count-users', [UserController::class, 'countUsers']);

Route::get('/count-messages', [MessageController::class, 'countMessages']);

Route::get('/count-institutions', [InstitutionController::class, 'countInstitutions']);

Route::get('/count-laws', [LawController::class, 'countLaws']);

//Crud Messages
Route::get('/messages', [MessageController::class, 'messages']);

//Crud Users
Route::get('/users', [UserController::class, 'users']);

//Crud Candidates
Route::get('/candidates', [CandidateController::class, 'candidates']);

//Crud Histories
Route::get('/histories', [HistoryController::class, 'histories']);

//Crud Institutions
Route::get('/institutions', [InstitutionController::class, 'institutions']);

//Crud Laws
Route::get('/laws', [LawController::class, 'laws']);
