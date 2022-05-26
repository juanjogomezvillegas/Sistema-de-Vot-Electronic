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

// Logout
Route::get('/logout', [HomeController::class, 'logout'])
    ->name('logout')
    ->middleware('apli', 'auth');

// Home Page
Route::get('/', [HomeController::class, 'index'])
    ->name('home')
    ->middleware(['apli']);

// Contact
Route::get('/contact', [MessageController::class, 'contact'])
    ->name('contact')
    ->middleware(['apli']);

// Vote
Route::post('/vote/{candidate}', [CandidateController::class, 'votes'])
    ->middleware('allowElection');

Route::get('/voted', [CandidateController::class, 'voted'])
    ->name('voted')
    ->middleware(['apli', 'allowElection']);

// Your Role
Route::get('/your-role', [UserController::class, 'yourRole'])
    ->middleware(['apli', 'auth']);

// Your Profile
Route::get('/your-profile', [UserController::class, 'yourProfile'])
    ->name('yourProfile')
    ->middleware(['apli', 'auth']);

Route::put('/change-data/{user}', [UserController::class, 'updateProfile'])
    ->middleware(['auth']);

Route::get('/change-image', [UserController::class, 'changeImage'])
    ->name('changeImage')
    ->middleware(['apli', 'auth']);

Route::put('/change-image/{user}', [UserController::class, 'updateChangeImage'])
    ->middleware(['auth']);

Route::get('/change-password', [UserController::class, 'changePassword'])
    ->name('changePassword')
    ->middleware(['apli', 'auth']);

Route::put('/change-password/{user}', [UserController::class, 'updateChangePassword'])
    ->middleware(['auth']);

// Home Admin Page
Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['apli', 'auth']);

// Configuration Page
Route::get('/configuration', [ConfigurationController::class, 'show'])
    ->name('configuration')
    ->middleware(['apli', 'auth', 'authAdmin']);

Route::put('/configuration/{configuration}', [ConfigurationController::class, 'update'])
    ->middleware(['auth', 'authAdmin']);

// Crud Users
Route::get('/users', [UserController::class, 'show'])
    ->name('users')
    ->middleware(['apli', 'auth', 'authAdmin']);

Route::post('/user/create', [UserController::class, 'create'])
    ->middleware(['auth', 'authAdmin']);

Route::put('/user/{user}', [UserController::class, 'update'])
    ->middleware(['auth', 'authAdmin']);

Route::delete('/user/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth', 'authAdmin']);

Route::get('/users/all', [UserController::class, 'users'])
    ->middleware(['auth', 'authAdmin']);

Route::get('/user/{user}', [UserController::class, 'user'])
    ->middleware(['auth', 'authAdmin']);

// Crud Candidates
Route::get('/candidates', [CandidateController::class, 'show'])
    ->name('candidates')
    ->middleware(['apli', 'auth', 'authManager']);

Route::post('/candidate/create', [CandidateController::class, 'create'])
    ->middleware(['auth', 'authManager']);

Route::put('/candidate/{candidate}', [CandidateController::class, 'update'])
    ->middleware(['auth', 'authManager']);

Route::delete('/candidate/{candidate}', [CandidateController::class, 'destroy'])
    ->middleware(['auth', 'authManager']);

Route::get('/candidates/all', [CandidateController::class, 'candidates'])
    ->middleware(['auth', 'authManager']);

Route::get('/candidate/{candidate}', [CandidateController::class, 'candidate'])
    ->middleware(['auth', 'authManager']);

Route::get('/candidates-seats', [CandidateController::class, 'candidatesSeats'])
    ->middleware(['auth', 'authManager']);

Route::put('/update-votes/{candidate}', [CandidateController::class, 'updateVotes'])
    ->middleware(['auth', 'authManager']);

// Results Page
Route::get('/results', [CandidateController::class, 'results'])
    ->name('results', 'authUser')
    ->middleware(['apli', 'auth', 'allowResult']);

Route::delete('/restart-votes', [CandidateController::class, 'restartVotes'])
    ->middleware(['auth', 'authManager', 'allowResult']);

// Pactometer Page
Route::get('/pactometer', [CandidateController::class, 'pactometer'])
    ->name('pactometer')
    ->middleware(['apli', 'auth', 'authUser', 'allowPactometer']);

Route::put('/candidate/position/{candidate}', [CandidateController::class, 'updatePosition'])
    ->middleware(['auth', 'authUser', 'allowPactometer']);

Route::get('/votes-yes', [CandidateController::class, 'votesYes'])
    ->middleware(['auth', 'authUser', 'allowPactometer']);

Route::get('/votes-no', [CandidateController::class, 'votesNo'])
    ->middleware(['auth', 'authUser', 'allowPactometer']);

Route::get('/votes-abstention', [CandidateController::class, 'votesAbstention'])
    ->middleware(['auth', 'authUser', 'allowPactometer']);

// Crud Message
Route::get('/messages', [MessageController::class, 'show'])
    ->name('messages')
    ->middleware(['apli', 'auth', 'authSupervisor']);

Route::post('/message/create', [MessageController::class, 'create']);

Route::delete('/message/{message}', [MessageController::class, 'destroy'])
    ->middleware(['auth', 'authSupervisor']);

Route::get('/messages/all', [MessageController::class, 'messages'])
    ->middleware(['auth', 'authSupervisor']);

Route::get('/message/{message}', [MessageController::class, 'message'])
    ->middleware(['auth', 'authSupervisor']);

// Crud Legislatures
Route::get('/legislatures', [LegislatureController::class, 'show'])
    ->name('legislatures')
    ->middleware(['apli', 'auth', 'authSupervisor', 'allowLegislatures']);

Route::post('/legislatures/create', [LegislatureController::class, 'create'])
    ->middleware(['auth', 'authManager', 'allowLegislatures']);

Route::put('/legislatures/{legislature}', [LegislatureController::class, 'update'])
    ->middleware(['auth', 'authManager', 'allowLegislatures']);

Route::delete('/legislatures/{legislature}', [LegislatureController::class, 'destroy'])
    ->middleware(['auth', 'authManager', 'allowLegislatures']);

Route::get('/legislatures/all', [LegislatureController::class, 'legislatures'])
    ->middleware(['auth', 'authSupervisor', 'allowLegislatures']);

Route::get('/legislature/last', [LegislatureController::class, 'lastLegislature'])
    ->middleware(['auth', 'authSupervisor', 'allowLegislatures']);

Route::get('/legislature/{legislature}', [LegislatureController::class, 'legislature'])
    ->middleware(['auth', 'authSupervisor', 'allowLegislatures']);

// Users Management
require __DIR__.'/auth.php';
