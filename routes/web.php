<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceTypeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/cp', function () {
//     return view('adminpanel');
// });
Route::get('/do', function () {
    return view('do');
})->middleware('auth');


Route::middleware(['auth'])->group(function () {

    Route::get('/cp', function () {
        // return 'this is admin';
        return view('adminpanel');
    });

    // Route::view('/dashboard/{any}', 'dashboard')
    // ->middleware('auth')
    // ->where('any', '.*');
});
Route::resource('/cp/users', UserController::class);
Route::resource('/cp/faculties', FacultyController::class);
Route::resource('/cp/departments', DepartmentController::class);
Route::resource('/cp/staff', StaffController::class);
Route::resource('/cp/rooms', RoomController::class);
Route::resource('/cp/device-types', DeviceTypeController::class);
Route::resource('/cp/devices', DeviceController::class);
Route::resource('/cp/teams', TeamController::class);
Route::resource('/cp/team-members', TeamMemberController::class);
Route::resource('/cp/reports', ReportController::class);
