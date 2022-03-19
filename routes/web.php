<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalSettingsController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Auth;
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

Route::resource('/hospital', HospitalSettingsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['web', 'auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resources([
        'doctors' => DoctorController::class,
        'patients' => PatientController::class,
    ]);
});
