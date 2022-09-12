<?php

use App\Http\Controllers\GithubController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/image-download', [ImageController::class, 'download'])->name('image.download');
Route::get('/task-list', [TaskController::class, 'index'])->name('task.list');
Route::get('/task-create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task-store', [TaskController::class, 'store'])->name('task.store');
Route::get('/task-edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/task-update/{id}', [TaskController::class, 'update'])->name('task.update');
Route::get('/task-delete', [TaskController::class, 'delete'])->name('task.delete');


// Route::get('auth/github', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('auth.github');
// Route::get('auth/github/callback', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('login/{provider}', [GithubController::class, 'redirectToGithub'])->name('auth.github');
Route::get('{provider}/callback', [GithubController::class, 'handleGithubCallback']);

// Route::get('login/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');
// Route::get('{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');
