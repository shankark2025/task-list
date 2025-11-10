<h2>Edit Employee</h2>

<!-- Show validation errors if any -->
<!--
@if ($errors->any())
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
-->
<style>
    .error_message{
        color:red;
        font-size: 0.8rem;
    }
</style>
<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- important: tells Laravel this is an update request -->

    <div>
        <label>Employee Name:</label>
        <input type="text" name="employee_name" value="{{ old('employee_name', $employee->employee_name) }}">
        <br>
        @error('employee_name')
                <p class="error_message">{{$message}}</p>
        @enderror

    </div>

    <div>
        <label>Employee Department:</label>
        <input type="text" name="employee_department" value="{{ old('employee_department', $employee->employee_department) }}">
         @error('employee_department')
                <p class="error_message">{{$message}}</p>
         @enderror

    </div>

    <div>
        <label>Employee Designation:</label>
        <input type="text" name="employee_designation" value="{{ old('employee_designation', $employee->employee_designation) }}">
        @error('employee_designation')
                <p class="error_message">{{$message}}</p>
         @enderror
    </div>
    <div>
        <label>Year:</label>
        <input type="number" name="Salary" value="{{ old('year', $employee->Salary) }}">
        @error('Salary')
                <p class="error_message">{{$message}}</p>
         @enderror
    </div>

    <button type="submit">Update Employee</button>
</form>

<br>
<a href="{{ route('employees.index') }}">← Back to list</a>
