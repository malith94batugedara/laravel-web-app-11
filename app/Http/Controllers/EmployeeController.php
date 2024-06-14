<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::all();
        return view('Employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $selectedDepartment = ['HR','IT','FINANCE','CLEANING'];
        return view('Employees.create',compact('departments','selectedDepartment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        $employee = new Employee;

        $employee->emp_name = $data['empname'];

        $employee->emp_address = $data['empaddress'];

        $employee->emp_age = $data['empage'];

        $employee->emp_department = $request->empdepart;

        $employee->save();

        return redirect(route('employee.all'))->with('status','Employee Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee,$employee_id)
    {
        $employeee = $employee::find($employee_id);
        $departments = Department::all();
        return view('Employees.edit',compact('employeee','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee,$employee_id)
    {
        $data = $request->validated();

        $employeeee = $employee::find($employee_id);

        $employeeee->emp_name = $data['empname'];

        $employeeee->emp_address = $data['empaddress'];

        $employeeee->emp_age = $data['empage'];

        $employeeee->emp_department = $request->empdepart;

        $employeeee->update();

        return redirect(route('employee.all'))->with('status','Employee Updated Successfully!');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee,Request $request)
    {
        $employeeeee=$employee::findOrFail($request->employee_delete_id);

        $employeeeee->delete();

        return redirect(route('employee.all'))->with('status','Employee Deleted Successfully!');
    }
}
