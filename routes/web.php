<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InquiryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/new-projects', [ProjectController::class, 'newProjects'])->name('projects.new');
Route::get('/landed-properties', [ProjectController::class, 'landedProperties'])->name('projects.landed');
Route::get('/project/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::post('/calculate', [InquiryController::class, 'calculate'])->name('calculate');

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/projects', App\Http\Controllers\Admin\ProjectController::class)
        ->names('admin.projects');

    Route::get('/inquiries', [App\Http\Controllers\Admin\InquiryController::class, 'index'])
        ->name('admin.inquiries.index');
    Route::get('/inquiries/{inquiry}', [App\Http\Controllers\Admin\InquiryController::class, 'show'])
        ->name('admin.inquiries.show');
    Route::put('/inquiries/{inquiry}', [App\Http\Controllers\Admin\InquiryController::class, 'update'])
        ->name('admin.inquiries.update');
    Route::delete('/inquiries/{inquiry}', [App\Http\Controllers\Admin\InquiryController::class, 'destroy'])
        ->name('admin.inquiries.destroy');
});
