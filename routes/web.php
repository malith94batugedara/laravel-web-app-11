<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-employees',[EmployeeController::class,'create'])->name('employee.create');

Route::post('/add-employees',[EmployeeController::class,'store'])->name('employee.store');

Route::get('/all-employees',[EmployeeController::class,'index'])->name('employee.all');

Route::get('/edit-employee/{employee_id}',[EmployeeController::class,'edit'])->name('employee.edit');

Route::post('/update-employee/{employee_id}',[EmployeeController::class,'update'])->name('employee.update');
