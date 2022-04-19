<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LegislatureController;

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

/*
GET - show
POST - create
PUT - update
DELETE - delete

create - 1
update - 2
delete - 3
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Logout
Route::get('/logout', [HomeController::class, 'logout'])->middleware('apli', 'auth')->name('logout');

//Home Page
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['apli']);

//Vote
Route::get('/vote', [CandidateController::class, 'vote'])->name('vote')->middleware(['apli']);

Route::post('/vote/{candidate}', [CandidateController::class, 'votes']);

Route::get('/voted', [CandidateController::class, 'voted'])->name('voted')->middleware(['apli']);

//Your Role
Route::get('/your-role', [UserController::class, 'yourRole'])->middleware(['apli', 'auth']);

//Your Profile
Route::get('/your-profile', [UserController::class, 'yourProfile'])->middleware(['apli', 'auth'])->name('yourProfile');

Route::put('/change-data/{user}', [UserController::class, 'updateProfile'])->middleware(['auth']);

Route::get('/change-image', [UserController::class, 'changeImage'])->middleware(['apli', 'auth'])->name('changeImage');

Route::put('/change-image/{user}', [UserController::class, 'updateChangeImage'])->middleware(['auth']);

Route::get('/change-password', [UserController::class, 'changePassword'])->middleware(['apli', 'auth'])->name('changePassword');

Route::put('/change-password/{user}', [UserController::class, 'updateChangePassword'])->middleware(['auth']);

//Home Admin Page
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['apli', 'auth'])->name('dashboard');

//Configuration Page
Route::get('/configuration', [ConfigurationController::class, 'show'])->middleware(['apli', 'auth', 'authAdmin'])->name('configuration');

Route::put('/configuration/{configuration}', [ConfigurationController::class, 'update'])->middleware(['auth', 'authAdmin']);

//Crud Users
Route::get('/users', [UserController::class, 'show'])->middleware(['apli', 'auth', 'authAdmin'])->name('users');

Route::post('/user/create', [UserController::class, 'create'])->middleware(['auth', 'authAdmin']);

Route::put('/user/{user}', [UserController::class, 'update'])->middleware(['auth', 'authAdmin']);

Route::delete('/user/{user}', [UserController::class, 'destroy'])->middleware(['auth', 'authAdmin']);

Route::get('/users/all', [UserController::class, 'users'])->middleware(['auth', 'authAdmin']);

Route::get('/user/{user}', [UserController::class, 'user'])->middleware(['auth', 'authAdmin']);

//Crud Candidates
Route::get('/candidates', [CandidateController::class, 'show'])->middleware(['apli', 'auth', 'authManager'])->name('candidates');

Route::post('/candidate/create', [CandidateController::class, 'create'])->middleware(['auth', 'authManager']);

Route::put('/candidate/{candidate}', [CandidateController::class, 'update'])->middleware(['auth', 'authManager']);

Route::delete('/candidate/{candidate}', [CandidateController::class, 'destroy'])->middleware(['auth', 'authManager']);

Route::get('/candidates/all', [CandidateController::class, 'candidates'])->middleware(['auth', 'authManager']);

Route::get('/candidate/{candidate}', [CandidateController::class, 'candidate'])->middleware(['auth', 'authManager']);

Route::get('/candidates-seats', [CandidateController::class, 'candidatesSeats'])->middleware(['auth', 'authManager']);

//Results Page
Route::get('/results', [CandidateController::class, 'results'])->middleware(['apli', 'auth'])->name('results', 'authUser');

Route::delete('/restart-votes', [CandidateController::class, 'restartVotes'])->middleware(['auth', 'authManager']);

Route::put('/sum-votes/{candidate}', [CandidateController::class, 'sumVotes'])->middleware(['auth', 'authManager']);

Route::put('/substract-votes/{candidate}', [CandidateController::class, 'substractVotes'])->middleware(['auth', 'authManager']);

//Pactometer Page
Route::get('/pactometer', [CandidateController::class, 'pactometer'])->middleware(['apli', 'auth', 'authUser'])->name('pactometer');

Route::put('/candidate/position/{candidate}', [CandidateController::class, 'updatePosition'])->middleware(['auth', 'authUser']);

Route::get('/votes-yes', [CandidateController::class, 'votesYes'])->middleware(['auth', 'authUser']);

Route::get('/votes-no', [CandidateController::class, 'votesNo'])->middleware(['auth', 'authUser']);

Route::get('/votes-abstention', [CandidateController::class, 'votesAbstention'])->middleware(['auth', 'authUser']);

//Crud Message
Route::get('/messages', [MessageController::class, 'show'])->middleware(['apli', 'auth', 'authSupervisor'])->name('messages');

Route::post('/message/create', [MessageController::class, 'create']);

Route::delete('/message/{message}', [MessageController::class, 'destroy'])->middleware(['auth', 'authSupervisor']);

Route::get('/messages/all', [MessageController::class, 'messages'])->middleware(['auth', 'authSupervisor']);

Route::get('/message/{message}', [MessageController::class, 'message'])->middleware(['auth', 'authSupervisor']);

//Crud Legislatures
Route::get('/legislatures', [LegislatureController::class, 'show'])->middleware(['apli', 'auth', 'authSupervisor'])->name('legislatures');

Route::get('/legislatures/all', [LegislatureController::class, 'legislatures'])->middleware(['auth', 'authSupervisor']);

Route::get('/legislature/{legislature}', [LegislatureController::class, 'legislature'])->middleware(['auth', 'authSupervisor']);

//Users Management
require __DIR__.'/auth.php';
