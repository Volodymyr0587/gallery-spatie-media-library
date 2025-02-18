<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/albums', AlbumController::class)
    ->middleware(['auth']);
Route::post('/alubms/{album}/upload', [AlbumController::class, 'upload'])
    ->middleware(['auth'])->name('albums.upload');
Route::get('albums/{album}/image/{image}', [AlbumController::class, 'showImage'])
    ->name('album.image.show');
Route::delete('albums/{album}/image/{image}', [AlbumController::class, 'destroyImage'])
    ->name('album.image.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
