<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/show', [ShowController::class, 'listShow'])->name('show');
    Route::get('/dashboard/show/{name}', [ShowController::class, 'show'])->name('singleshow.show');
    Route::get('/dashboard/show/edit/add', [ShowController::class,'addShow'])->name('show.add');
    Route::post('/dashboard/show/edit/store', [ShowController::class, 'storeShow'])->name('show.store');
    Route::post('/dashboard/show/edit/store/{id}',[ShowController::class, 'updateShow'])->name('show.update');
    Route::get('/dashboard/show/edit/{id}',[ShowController::class, 'editShow'])->name('show.edit');
    Route::get('/dashboard/show/edit/{id}/destroy', [ShowController::class, 'destroyShow'])->name('show.destroy');

    Route::get('/dashboard/event', [EventController::class, 'listEvent'])->name('event');
    Route::get('/dashboard/event/edit/add', [EventController::class, 'addEvent'])->name('event.add');
    Route::post('/dashboard/event/edit/store', [EventController::class, 'storeEvent'])->name('event.store');
    Route::get('/dashboard/event/edit/{id}/destroy', [EventController::class, 'destroyEvent'])->name('event.destroy');
});

require __DIR__.'/auth.php';
