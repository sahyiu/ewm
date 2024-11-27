<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\OfficerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ADMIN
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/releaseStudentNo', [AdminController::class, 'releaseStudentNo'])->name('admin.releaseStudentNo');
    Route::get('/admin/releaseStudentNo', [AdminController::class, 'showReleaseStudentNo']);
    Route::post('/admin/releaseStudentNo', [AdminController::class, 'releaseStudentNo'])->name('admin.releaseStudentNo');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('admin/schedule', [ScheduleController::class, 'showSchedule'])->name('admin.schedule');
    Route::post('admin/schedule/store', [ScheduleController::class, 'storeSchedule'])->name('admin.schedule.store');
    Route::get('/admin/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('admin.schedule.edit');
    Route::put('admin/schedule/{id}', [ScheduleController::class, 'update'])->name('admin.schedule.update');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/billings', [AdminController::class, 'billings'])->name('admin.billings');
});

//--------------------------------------------------------------



Route::middleware(['auth', 'role:registrar'])->group(function(){
    Route::get('/registrar/dashboard', [RegistrarController::class, 'dashboard'])->name('registrar.dashboard');
});

Route::middleware(['auth', 'role:officer'])->group(function(){
    Route::get('/officer/dashboard', [OfficerController::class, 'dashboard'])->name('officer.dashboard');
});

require __DIR__.'/auth.php';