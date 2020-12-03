@extends('employee.layouts')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Employee</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
        </div> -->
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check the following fields <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('employee.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')
    
    <div class="form-group">
      <strong>First name:</strong>
      <input type="text" name="first_name" class="form-control" placeholder="first name" value="{{ $employee->first_name }}">
    </div>

    <div class="form-group">
      <strong>Last name:</strong>
      <input type="text" name="last_name" class="form-control" placeholder="last name" value="{{ $employee->last_name }}">
    </div>

    <div class="form-group">
      <strong>Address:</strong>
      <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $employee->address }}">
    </div>

    <div class="form-group">
      <strong>Contact no:</strong>
      <input type="text" name="contact_number" class="form-control" placeholder="Mobile/Tele no." value="{{ $employee->contact_number }}">
    </div>

    <div class="form-group">
      <strong>Gender:</strong><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" 
            type="radio" 
            name="gender" 
            id="" 
            value="M"
            {{ $employee->gender == 'M' ? 'checked' : '' }} >
        <label class="form-check-label">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" 
            type="radio" 
            name="gender" 
            id="" 
            value="F"
            {{ $employee->gender == 'F' ? 'checked' : '' }} >
        <label class="form-check-label">Female</label>
      </div>
    </div>

    <div class="form-group">
      <strong>Select Job Title</strong>
      <select class="form-control" name="title">
          <option value="IT Consultant" {{ $employee->title == 'IT Consultant' ? 'selected' : '' }} >IT Consultant</option>
          <option value="Developer" {{ $employee->title == 'Developer' ? 'selected' : '' }} >Developer</option>
          <option value="Quality Assurance" {{ $employee->title == 'Quality Assurance' ? 'selected' : '' }} >Quality Assurance</option>
          <option value="System Administrator" {{ $employee->title == 'System Administrator' ? 'selected' : '' }} >System Administrator</option>
      </select>
    </div>

    <div class="form-group">
      <strong>Select Company</strong>
      <select class="form-control" name="company_id">
        @foreach ($companies as $company)
          <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
      </select>
    </div>
    <!-- <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
   
</form>
@endsection