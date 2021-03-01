<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Attendance;
use App\Http\Controllers\AttendanceController;
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
    $lastday = \Carbon\Carbon::parse(\Carbon\Carbon::now())->endOfMonth()->format('d');
    $employees = Employee::all();
    return view('welcome', compact('employees','lastday'));
});
Route::get('/json/employees', function () {
    $lastday = \Carbon\Carbon::parse(\Carbon\Carbon::now())->endOfMonth()->format('d');
    $employees = Employee::with('attendances')->withCount('attendances')->get();
    return response()->json([
        'employees'=> $employees,
        'lastday'=> $lastday,
    ]);
})->name('json_employees');

Route::post('attendance/store', [AttendanceController::class,'store']);
Route::post('attendance/destroy', [AttendanceController::class,'destroy']);
Route::post('attendance/request_leave', [AttendanceController::class,'SumitRequest']);