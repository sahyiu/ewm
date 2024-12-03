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
    Route::get('/admin/dashboard', [AdminController::class, 'viewdashboard'])->name('admin.dashboard');
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
    Route::get('/admin/schedule/new', [ScheduleController::class, 'new'])->name('admin.schedule.new');
    Route::put('admin/schedule/{id}', [ScheduleController::class, 'update'])->name('admin.schedule.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/instructor', [AdminController::class, 'showInstructors'])->name('admin.instructor');
    Route::post('/admin/instructor', [AdminController::class, 'storeInstructor'])->name('admin.instructor.store');
    Route::get('/admin/instructor/{id}/edit', [AdminController::class, 'editInstructor'])->name('admin.instructor.edit');
    Route::put('/admin/instructor/{id}', [AdminController::class, 'updateInstructor'])->name('admin.instructor.update');
    Route::get('/admin/instructor/new', [AdminController::class, 'createInstructor'])->name('admin.instructor.new');

});


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/billings', [AdminController::class, 'billings'])->name('admin.billings');
});

//--------------------------------------------------------------



Route::middleware(['auth', 'role:registrar'])->group(function(){
    Route::get('/registrar/dashboard', [RegistrarController::class, 'dashboard'])->name('registrar.dashboard');
    Route::get('/registrar/generate-cor', [RegistrarController::class, 'generateCOR'])->name('registrar.generate-cor');
    Route::get('/registrar/create-student', [RegistrarController::class, 'createStudent'])->name('registrar.create-student');
    Route::post('/registrar/store', [RegistrarController::class, 'storeStudent'])->name('registrar.store');
});

Route::middleware(['auth', 'role:officer'])->group(function(){
    
    Route::get('/officer/dashboard', [OfficerController::class, 'dashboard'])->name('officer.dashboard');

    Route::get('/officer/manage', [OfficerController::class, 'manage'])->name('officer.manage');
    Route::get('/officer/create', [OfficerController::class, 'create'])->name('officer.create');
    Route::post('/officer/store', [OfficerController::class, 'store'])->name('officer.store');

    Route::get('/officer/student/{id}/edit', [OfficerController::class, 'edit'])->name('officer.edit');
    Route::put('/officer/student/{id}', [OfficerController::class, 'update'])->name('officer.update');
    
});

require __DIR__.'/auth.php';
