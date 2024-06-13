@extends('Layouts.frontend')

@section('title','EMS | All Employees')

@section('content')

<div class="container mt-4">

    @if(session('status'))
                            <div class="alert alert-success">
                                  {{ session('status') }}
                            </div>
    @endif

    <h1 class="text-center">All Employees<a href="{{ route('employee.create') }}" class="btn btn-primary float-end">Add New Employee</a></h1><br/>

    <table class="table table-bordered table-dark">
        
        <thead>
          
            <tr>
              <th>Employee Name</th>
              <th>Employee Address</th>
              <th>Employee Age</th>
              <th>Employee Department</th>
              <th>Action</th>
            </tr>

        </thead>

        <tbody>
        @foreach ($employees as $employee)
            
            <tr>
                <td>{{$employee->emp_name}}</td>
                <td>{{$employee->emp_address}}</td>
                <td>{{$employee->emp_age}}</td>
                <td>{{$employee->emp_department}}</td>
                <td>
                    <a href="" class="btn btn-success">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>


    </table>

</div>
@endsection
