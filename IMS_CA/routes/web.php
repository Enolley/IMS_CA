<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Manager;
use App\Http\Controllers\Client;
use App\Http\Controllers\Job;
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

Route::get('/', [Auth::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/registration', [Auth::class, 'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user', [Auth::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [Auth::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [Dashboards::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [Auth::class, 'logout']);


Route::get('/dashboard', [Admin::class, 'dashboard']);
Route::get('/desktops', [Admin::class, 'desktops']);
Route::get('/add-desktop', [Admin::class, 'addDesktop']);
Route::post('/new-desktop', [Admin::class, 'newDesktop'])->name('new-desktop');
Route::get('/available-desktops', [Admin::class, 'availableDesktop']);
Route::get('/faulty-desktops', [Admin::class, 'faultyDesktop']);
Route::get('/missing-desktops', [Admin::class, 'missingDesktop']);
Route::post('report-faulty-desktop', [Admin::class, 'reportFaultyDesktop'])->name('report-faulty-desktop');
Route::post('report-missing-desktop', [Admin::class, 'reportMissingDesktop'])->name('report-missing-desktop');
Route::post('/assign-available-desktop', [Admin::class, 'assignAvailableDesktop'])->name('assign-available-desktop');
Route::post('/faulty-desktop-feedback', [Admin::class, 'faultyDesktopFeedback'])->name('faulty-desktop-feedback');
Route::post('/missing-desktop-feedback', [Admin::class, 'missingDesktopFeedback'])->name('missing-desktop-feedback');
Route::get('/view-recommendations', [Admin::class, 'viewRecommendations']);
Route::get('/check-history', [Admin::class, 'checkHistory']);
Route::post('/approve', [Admin::class, 'approveRequest'])->name('approve');
Route::post('/reject', [Admin::class, 'rejectRequest'])->name('reject');


Route::get('/user-dashboard', [Client::class, 'dashboard']);
Route::get('/equipment-request-form', [Client::class, 'requestForm']);
Route::post('/submit-request', [Client::class, 'submitRequest'])->name('submit-request');
Route::get('/request-status', [Client::class, 'requestStatus']);
Route::get('/request-history', [Client::class, 'requestHistory']);

Route::get('/manager-dashboard', [Manager::class, 'dashboard']);
Route::get('/recommend-equipment', [Manager::class, 'recommendEquipment']);
Route::post('/recommend', [Manager::class, 'recommend'])->name('recommend');
Route::get('/recommend-history', [Manager::class, 'recommendHistory']);

Route::get('/task-dashboard', [Job::class, 'dashboard']);
Route::get('/deliver-equipment', [Job::class, 'deliverEquipment']);
Route::get('/job-history', [Job::class, 'jobHistory']);
Route::post('/assign', [Job::class, 'assign'])->name('assign')
;
