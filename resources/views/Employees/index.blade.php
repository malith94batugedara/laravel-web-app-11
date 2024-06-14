@extends('Layouts.frontend')

@section('title','EMS | All Employees')

@section('content')

<div class="modal fade" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
     <form action="{{ route('employee.delete') }}" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Delete Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="employee_delete_id" id="employee_delete_id"/>
          <h3>Are you sure want to delete this Employee</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Yes Delete</button>
        </div>
     </form>
  
      </div>
    </div>
</div>

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
                    <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-success">Edit</a>
                    {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                    <button type="button" value="{{ $employee->id }}" class="btn btn-danger deleteEmployeeBtn">Delete</button>
                </td>
            </tr>
        @endforeach

        </tbody>


    </table>

</div>

@section('scripts')

<script>
    $(document).ready(function() {
      //  $('.deleteCategoryBtn').click(function() {
        $(document).on('click','.deleteEmployeeBtn',function() {
          let employee_id = $(this).val();
          $('#employee_delete_id').val(employee_id);
          $('#deleteModal').modal('show');
       });
    });
</script>

@endsection

@endsection
