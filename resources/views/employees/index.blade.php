<h2>All Employees</h2>

<a href="{{ route('employees.create') }}">Add New Employee</a>

<ul>
@foreach ($employees as $employee)
    <li>
        {{ $employee->employee_name }} is a {{ $employee->employee_designation }} (Salary: {{ $employee->Salary }} /-)
        <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
