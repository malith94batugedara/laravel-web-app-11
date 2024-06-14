@extends('Layouts.frontend')

@section('title','EMS | Edit Employee')

@section('content')

<div class="container mt-4">

    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                              <div> {{ $error }} </div>
                            @endforeach
                        </div>
    @endif

    <h1 class="text-center">Edit Employee<a href="{{ route('employee.all') }}" class="btn btn-primary float-end">All Employees</a></h1>

    <form action="{{ route('employee.update',$employeee->id) }}" method="post">
      @csrf
       <label>Employee Name</label>
       <input type="text" name="empname" class="form-control" value="{{ $employeee->emp_name }}" placeholder="Enter Employee Name"/><br/>

       <label>Employee Address</label>
       <input type="text" name="empaddress" class="form-control" value="{{ $employeee->emp_address }}" placeholder="Enter Employee Address"/><br/>

       <label>Employee Age</label>
       <input type="text" name="empage" class="form-control" value="{{ $employeee->emp_age }}" placeholder="Enter Employee Age"/><br/>

       <label>Employee Department</label>
       <select name="empdepart" class="form-control">
        @foreach ($departments as $department)
            {{-- <option value="FINANCE">{{ $department->department_name }}</option> --}}
            <option value="{{ $department->id }}" {{ $department->id == $employeee->emp_department ? 'selected' : '' ;}}>{{ $department->department_name }}</option>
        @endforeach
       </select><br/>

       <input type="submit" value="Update" class="btn btn-success"/>
    </form>

</div>

@endsection


