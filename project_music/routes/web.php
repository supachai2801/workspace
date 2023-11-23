<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AristController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/login', [MemberController::class, 'login'])->name('login');
Route::get('/logout', [MemberController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::get('edit-profile', [MemberController::class, 'editProfile'])->name('editProfile');
Route::post('edit-profile', [MemberController::class, 'editProfilePost'])->name('edit-profile.post');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/remove-review/{id}', [ReviewController::class, 'remove'])->name('remove');

Route::prefix('arists')->as('arist.')->group(function () {
    Route::get('/', [AristController::class, 'arist'])->name('index');
    Route::get('/edit-profile', [AristController::class, 'editProfile'])->name('editProfile');
    Route::post('/edit-profile', [AristController::class, 'editProfilePost'])->name('edit');
    Route::get('/{id}', [AristController::class, 'detail'])->name('detail');
    Route::post('/edit-review/{id}', [AristController::class, 'editReview'])->name('detail');
    Route::post('/{id}/review', [AristController::class, 'review'])->name('review');
    Route::post('/{id}/event', [AristController::class, 'storeEvent'])->name('event.store');
    Route::get('/event/{status}/{id}', [AristController::class, 'updateEvent'])->name('event.update');
    Route::get('/event-cancel/{id}', [AristController::class, 'cancelEvent'])->name('event.cancel');
    Route::get('/report/{id}', [AristController::class, 'report'])->name('report.store');
    Route::get('/{id}/add-video', [AristController::class, 'addVideo'])->name('addVideo');
    Route::get('/{id}/remove-video', [AristController::class, 'removeVideo'])->name('removeVideo');
    Route::post('/{id}/add-video', [AristController::class, 'addVideoPost'])->name('addVideo.post');
    Route::get('arists/register', [AristController::class, 'register'])->name('register');
    Route::post('arists/register', [AristController::class, 'store'])->name('store');
});

Route::prefix('admin')->as('admin.')->group(function(){
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('login.post');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout.post')->middleware('auth.admin');
    Route::get('/', [AdminController::class, 'index'])->name('index')->middleware('auth.admin');
    Route::get('/approve/{status}/{id}', [AdminController::class, 'approve'])->name('approve')->middleware('auth.admin');
});

Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contactUs');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::view('layout', 'layouts.index');
