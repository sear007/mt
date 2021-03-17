<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Attendance;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DeployCableController;
use App\Http\Controllers\RunCableController;


Route::get('/deploy_cable',[DeployCableController::class,'index'])->name('deploy_cable');
Route::get('/deploy_cable/print',[DeployCableController::class,'deploy_cable_print']);
Route::get('/deploy_cable/json',[DeployCableController::class,'getDataJson'])->name('getDataJson');
Route::post('/deploy_cable/store',[DeployCableController::class,'store'])->name('deploy_cable_store');
Route::post('/deploy_cable/destroy',[DeployCableController::class,'destroy'])->name('deploy_cable_destroy');
Route::get('/deploy_cable/edit/{id}',[DeployCableController::class,'edit'])->name('deploy_cable_edit');
Route::post('/deploy_cable/update',[DeployCableController::class,'update'])->name('deploy_cable_update');

Route::get('/run_cable', [RunCableController::class,'index'])->name('run_cable');



Route::get('/attendance',[AttendanceController::class,'index'])->name('attendance');
Route::get('/json/employees', [EmployeeController::class,'employeeJson']);
Route::get('/json/attendances', [AttendanceController::class,'AttendancesJson']);

Route::post('attendance/store', [AttendanceController::class,'store']);
Route::post('attendance/destroy', [AttendanceController::class,'destroy']);
Route::post('attendance/request_leave', [AttendanceController::class,'SumitRequest']);
Route::post('attendance/request_leave/destroy', [AttendanceController::class,'DestroyRequest']);
Route::post('attendance/print',[AttendanceController::class,'PrintAttendances'])->name('print_attendance');


Route::get('employees/print', [EmployeeController::class,'print'])->name('employees_print');
Route::get('employees', [EmployeeController::class,'index'])->name('employees');
Route::post('employees', [EmployeeController::class,'store'])->name('employees_store');
Route::get('employees/edit/{id}', [EmployeeController::class,'edit'])->name('employees_edit');
Route::post('employees/update', [EmployeeController::class,'update'])->name('employees_update');
Route::post('employees/destroy', [EmployeeController::class,'destroy'])->name('employees_destroy');