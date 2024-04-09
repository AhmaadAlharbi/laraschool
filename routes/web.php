<?php

use App\Http\Controllers\ClassRoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolLevelController;
use App\Http\Controllers\SubClassroomController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    //######### Schools #############

    Route::middleware('auth')->group(function () {
        Route::resource('levels', SchoolLevelController::class);
        Route::resource('classrooms', ClassRoomController::class);
        Route::resource('subclassrooms', SubClassroomController::class);
    });
    //$$$$END my route
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});








require __DIR__ . '/auth.php';
