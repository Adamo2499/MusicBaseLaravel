<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\AlbumsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
 
//MainController

Route::get('/',[MainController::class,'returnHomePage']);
Route::get('/dashboard',[MainController::class,'returnDashboard']);


//ArtistsController

Route::get('/artists/list', [ArtistsController::class,'list']);
Route::get('/artists/add', [ArtistsController::class, "create"]);
Route::post('/artists/save', [ArtistsController::class, "store"]);
Route::get('/artists/edit/{id}', [ArtistsController::class,'edit']);
Route::post('/artists/update/{id}', [ArtistsController::class,'update']);
Route::get('/artists/show/{id}', [ArtistsController::class,'show']);
Route::post('/artists/delete/{id}', [ArtistsController::class,'destroy']);

//SongsController

Route::get('/songs/list', [SongsController::class,'list']);
Route::get('/songs/add', [SongsController::class, "create"]);
Route::post('/songs/save', [SongsController::class, "store"]);
Route::get('/songs/edit/{id}', [SongsController::class,'edit']);
Route::post('/songs/update/{id}', [SongsController::class,'update']);
Route::get('/songs/show/{id}', [SongsController::class,'show']);
Route::post('/songs/delete/{id}', [SongsController::class,'destroy']);

//AlbumsController

Route::get('/albums/list', [AlbumsController::class,'list']);
Route::get('/albums/add', [AlbumsController::class, "create"]);
Route::post('/albums/save', [AlbumsController::class, "store"]);
Route::get('/albums/edit/{id}', [AlbumsController::class,'edit']);
Route::post('/albums/update/{id}', [AlbumsController::class,'update']);
Route::get('/albums/show/{id}', [AlbumsController::class,'show']);
Route::post('/albums/delete/{id}', [AlbumsController::class,'destroy']);

//Error Codes
Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');