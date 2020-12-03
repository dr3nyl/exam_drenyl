@extends('employee.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Employees</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Add Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered text-center">
        <tr>
            <th>Employee no</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>Contact no</th>
            <th>Gender</th>
            <th>Company</th>
            <th>Job Title</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->contact_number }}</td>
            <td>@if($employee->gender == 'M')
                    {{ "Male" }}
                @endif
                @if($employee->gender == 'F')
                {{ "Female" }} 
                @endif </td>
            <td>{{ $employee->company_name }}</td>
            <td>{{ $employee->title }}</td>
            <td>
                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
   
                    <!-- <a class="btn btn-info" href="{{ route('employee.show',$employee->id) }}">Show</a> -->
    
                    <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    <p class="pull-right">{!! $employees->links() !!}</p>
      
@endsection