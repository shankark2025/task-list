@extends('layouts.app')
<style>
    .error_message{
        color:red;
        font-size: 0.8rem;
    }
</style>
@section('content')
<h2>Add Employee</h2>

<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <input type="text" name="employee_name" placeholder="Name"><br>
    @error('employee_name')
                <p class="error_message">{{$message}}</p>
    @enderror
    <input type="text" name="employee_department" placeholder="Department"><br>
     @error('employee_department')
                <p class="error_message">{{$message}}</p>
    @enderror
    <input type="text" name="employee_designation" placeholder="Designation"><br>
     @error('employee_designation')
                <p class="error_message">{{$message}}</p>
    @enderror
    <input type="number" name="Salary" placeholder="Salary"><br>
     @error('Salary')
                <p class="error_message">{{$message}}</p>
    @enderror
    <button type="submit">Save</button>
</form>
@endsection
