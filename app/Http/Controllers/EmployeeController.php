<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\myController;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct( protected EmployeeRepository $employees){}
    public function index()
    {
        //
       // $employees=Employee::all();
        $employees=$this->employees->getAll();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /*

    In short, Laravel’s Route::resource() is a shortcut to create all
     basic CRUD routes (Create, Read, Update, Delete) for a given resource.

    | HTTP Method | URL                  | Controller Method | Purpose                            |
    | ----------- | -------------------- | ----------------- | ---------------------------------- |
    | GET         | /employees           | index()           | Show all employees                 |
    | GET         | /employees/create    | create()          | Show form to create a new employee |
    | POST        | /employees           | store()           | Save new employee to database      |
    | GET         | /employees/{id}      | show($id)         | Show one specific employee         |
    | GET         | /employees/{id}/edit | edit($id)         | Show form to edit employee         |
    | PUT / PATCH | /employees/{id}      | update($id)       | Update employee in database        |
    | DELETE      | /employees/{id}      | destroy($id)      | Delete employee                    |


    */





    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'employee_name' => 'required',
            'employee_department' => 'required',
            'employee_designation' => 'required',
            'Salary' => 'required|integer',
        ]);

        $emp=Employee::create($request->all());
        return redirect()->action([myController::class, 'dashboard'],['id' => $emp->id]);
        /*
        return redirect()->route('employees.index')
                        ->with('success', 'Employee added successfully!');
                         //return view('employees.create');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
         return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $request->validate([
            'employee_name' => 'required',
            'employee_department' => 'required',
            'employee_designation' => 'required',
            'Salary' => 'required|integer',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')
                         ->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('employees.index')
                         ->with('success', 'Employee deleted successfully!');
    }
}
