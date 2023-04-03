<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Models\Video;

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
    return view('video.create');
})->name('/');

Route::get('/videos', [VideoController::class, 'index'])->name('video.index');
Route::get('/videos/create', [VideoController::class, 'create'])->name('video.create');
Route::post('/videosstore', [VideoController::class, 'store'])->name('video.store');
Route::get('/videos/{id}', [VideoController::class, 'edit'])->name('video.edit');
Route::put('/videos/{id}/update', [VideoController::class, 'update'])->name('video.update');
Route::get('/videos/{id}/delete', [VideoController::class, 'delete'])->name('video.delete');
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('video.show');
