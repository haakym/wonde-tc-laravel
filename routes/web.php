<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;

Route::get('/', [TeacherController::class, 'index'])->name('home');
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('/classes/{name}', [ClassController::class, 'show'])
    ->where('name', '[\w\s\-_\/]+') // as classes can have slashes etc.
    ->name('classes.show');
