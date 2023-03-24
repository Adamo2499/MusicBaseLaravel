<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PlaylistsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
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
Route::get('/artists/details/{id}', [ArtistsController::class,'details']);

//SongsController

Route::get('/songs/list', [SongsController::class,'list']);
Route::get('/songs/add', [SongsController::class, "create"])->middleware('auth');
Route::post('/songs/save', [SongsController::class, "store"]);
Route::get('/songs/edit/{id}', [SongsController::class,'edit']) -> middleware('auth');
Route::post('/songs/update/{id}', [SongsController::class,'update']);
Route::get('/songs/show/{id}', [SongsController::class,'show']) ->middleware('auth');
Route::post('/songs/delete/{id}', [SongsController::class,'destroy']);

//AlbumsController

Route::get('/albums/list', [AlbumsController::class,'list']);
Route::get('/albums/add', [AlbumsController::class, "create"]) ->middleware('auth');
Route::post('/albums/save', [AlbumsController::class, "store"]);
Route::get('/albums/edit/{id}', [AlbumsController::class,'edit']) ->middleware('auth');
Route::post('/albums/update/{id}', [AlbumsController::class,'update']);
Route::get('/albums/show/{id}', [AlbumsController::class,'show']) ->middleware('auth');
Route::post('/albums/delete/{id}', [AlbumsController::class,'destroy']);
Route::get('/albums/details/{id}', [AlbumsController::class, 'details']);


//PlaylistsController

Route::get('/playlists/list', [PlaylistsController::class,'list'])->middleware('auth');
Route::get('/playlists/add', [PlaylistsController::class, "create"]) ->middleware('auth');
Route::post('/playlists/save', [PlaylistsController::class, "store"]);
Route::get('/playlists/edit/{id}', [PlaylistsController::class,'edit'])->middleware('auth');
Route::post('/playlists/update/{id}', [PlaylistsController::class,'update']);
Route::get('/playlists/show/{id}', [PlaylistsController::class,'show'])->middleware('auth');
Route::post('/playlists/delete/{id}', [PlaylistsController::class,'destroy']);
Route::get('/playlists/expand', [PlaylistsController::class,'expand'])->middleware('auth');

//UsersController

Route::get('/users/list', [UsersController::class,'list'])->middleware('auth');
Route::get('/users/edit/{id}', [UsersController::class,'edit'])->middleware('auth');
Route::post('/users/update/{id}', [UsersController::class,'update']);
Route::get('/users/show/{id}', [UsersController::class,'show'])->middleware('auth');
Route::post('/users/delete/{id}', [UsersController::class,'destroy']);

//Error Codes

// Route::any('{query}', function() { return redirect('/errors/404'); })->where('query', '.*');

//Authentication

Route::get('/login', [AuthController::class,'changeAuthStatus']);
Route::get('/logout', [AuthController::class,'changeAuthStatus']);

// //ImageController
// Route::controller(ImageController::class)->group(function(){
//     Route::get('/image-upload', 'index')->name('image.form');
//     Route::post('/upload-image', 'storeImage')->name('image.store');
// });

require __DIR__.'/auth.php';
