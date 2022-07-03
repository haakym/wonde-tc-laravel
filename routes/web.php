<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;

Route::get('/', [TeacherController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/{id}', [TeacherController::class, 'show']);
Route::get('/classes/{name}', [ClassController::class, 'show'])
    ->where('name', '[\w\s\-_\/]+')
    ->name('classes.show');
