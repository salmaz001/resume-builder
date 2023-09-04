<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeDetailsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('resume-builder', ResumeDetailsController::class)->middleware('auth');
Route::post('resume-builder/update', [ResumeDetailsController::class, 'update'])->name('update');
Route::get('/resume/{resumeLink}', [ResumeDetailsController::class, 'show'])->name('resume.show');