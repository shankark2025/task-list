<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    // Example: get all employees
    public function getAll()
    {
        $users = Employee::all();
         return $users;
    }

    public function create(array $data)
    {
        return Employee::create($data);
    }


    /**
     * Find a single employee by ID.
     */
    public function find($id)
    {
        return Employee::findOrFail($id);
    }

      /**
     * Update an existing employee.
     */
    public function update($id, array $data)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    /**
     * Delete an employee.
     */
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        return $employee->delete();
    }

     /**
     * Get employees by department.
     */
    public function getByDepartment(string $department)
    {
        return Employee::where('employee_department', $department)->get();
    }

     /**
     * Get top employees by salary.
     */
    public function getTopBySalary($limit = 5)
    {
        return Employee::orderBy('Salary', 'desc')->take($limit)->get();
    }
    public function count(): int
    {
        // Centralized logic
        //return User::count();
        return Employee::count();
    }

    public function verifiedCount(): int
    {
        // Centralized logic
        //return User::count();
        return Employee::whereNotNull('email_verified_at')->count();
    }

     public function findEmployee(int $id): array
    {
         $user = Employee::find($id);
         return $user ? $user->toArray() : null;
    }
}
