<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\DeparmentController;
use App\Http\Controllers\SchoolLevelController;
use App\Http\Controllers\SubClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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
        Route::resource('departments', DeparmentController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('teachers', TeacherController::class);
        Route::get('/assign-subjects-to-classroom', [ClassroomController::class, 'showAssignSubjectsForm'])
            ->name('assign-subjects-to-classroom');
        Route::get('/assign-teachers-to-subcalssrooms/{subclassroom}', [SubClassroomController::class, 'showAssignTeachers'])
            ->name('assign-teachers-to-subclassroom');
    });
    //$$$$END my route
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});








require __DIR__ . '/auth.php';
