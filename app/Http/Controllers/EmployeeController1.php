<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController1 extends Controller
{
    public function __construct(protected EmployeeRepository $employees)
    {
    }

    // Show all employees
    public function index()
    {
        $allEmployees = $this->employees->getAll();
        return view('employees.index', compact('allEmployees'));
    }

    // Show form to create employee
    public function create()
    {
        return view('employees.create');
    }

    // Store new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required',
            'employee_department' => 'required',
            'employee_designation' => 'required',
            'Salary' => 'nullable|integer',
        ]);

        $this->employees->create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    // Show a single employee
    public function show($id)
    {
        $employee = $this->employees->find($id);
        return view('employees.show', compact('employee'));
    }

    // Show edit form
    public function edit($id)
    {
        $employee = $this->employees->find($id);
        return view('employees.edit', compact('employee'));
    }

    // Update employee
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'employee_name' => 'required',
            'employee_department' => 'required',
            'employee_designation' => 'required',
            'Salary' => 'nullable|integer',
        ]);

        $this->employees->update($id, $validated);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    // Delete employee
    public function destroy($id)
    {
        $this->employees->delete($id);
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
