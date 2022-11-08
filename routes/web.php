<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('admin', [AdminController::class, 'index']);

Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);

Route::prefix('user')->group(function(){
    Route::get(
        'courses/',
        [UserController::class, 'index']
    )->name('user.courses');

    Route::get(
        'courses/{course}',
        [UserController::class, 'detail']
    )->name('user.courses.detail');

    // Route::post(
    //     'courses/request/detail',
    //     [UserController::class, 'requestDetailPost']
    // )->name('user.courses.request.detail_post');
    Route::post(
        'request_detail/',
        [UserController::class, 'requestDetail']
    )->name('user.request_detail');

    Route::get(
        'courses/request/{course}',
        [UserController::class, 'request']
    )->name('user.courses.request');


    Route::post(
        'request_finish/',
        [UserController::class, 'requestFinish']
    )->name('user.request_finish');


    //決済
    Route::get(
        'payment/{booking_id}',
        [UserController::class, 'payment']
    )->name('user.payment');
    Route::post(
        'payment/',
        [UserController::class, 'paymentFinish']
    )->name('user.payment.finish');
});

require __DIR__.'/auth.php';
