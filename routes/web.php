<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Attendance;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
Route::get('/', function () {
    $lastday = \Carbon\Carbon::parse(\Carbon\Carbon::now())->endOfMonth()->format('d');
    $employees = Employee::all();
    return view('welcome', compact('employees','lastday'));
});
Route::get('/json/employees', [EmployeeController::class,'employeeJson']);
Route::get('/json/attendances', [AttendanceController::class,'AttendancesJson']);

Route::post('attendance/store', [AttendanceController::class,'store']);
Route::post('attendance/destroy', [AttendanceController::class,'destroy']);
Route::post('attendance/request_leave', [AttendanceController::class,'SumitRequest']);
Route::post('attendance/request_leave/destroy', [AttendanceController::class,'DestroyRequest']);
Route::post('attendance/print',[AttendanceController::class,'PrintAttendances'])->name('print_attendance');


Route::get('employees', [EmployeeController::class,'index'])->name('employees');
Route::post('employees', [EmployeeController::class,'store'])->name('employees_store');
Route::get('employees/edit/{id}', [EmployeeController::class,'edit'])->name('employees_edit');
Route::post('employees/update', [EmployeeController::class,'update'])->name('employees_update');
Route::post('employees/destroy', [EmployeeController::class,'destroy'])->name('employees_destroy');