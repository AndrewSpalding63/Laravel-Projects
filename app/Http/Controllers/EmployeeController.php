<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' =>  'string|required',
            'last_name'  =>  'string|required',
            'email'      =>  'email|nullable',
            'phone'      =>  'numeric|nullable',
            'company_id' =>  'required',
        ]);

        if (Employee::create($data)) {
            return back()->with(['message' => 'Employee created successfully!', 'status' => 'success']);
        } else {
            return back()->with(['message' => 'Something went wrong!', 'status' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return \view('admin.employee.view', \compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'first_name' =>  'string|required',
            'last_name'  =>  'string|required',
            'email'      =>  'email|nullable',
            'phone'      =>  'numeric|nullable',
            'company_id' =>  'required',
        ]);

        if ($employee->update($data)) {
            return back()->with(['message' => 'Employee updated successfully!', 'status' => 'success']);
        } else {
            return back()->with(['message' => 'Something went wrong!', 'status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->delete()) {
            return back()->with(['message' => 'Employee deleted successfully!', 'status' => 'success']);
        } else {
            return back()->with(['message' => 'Something went wrong!', 'status' => 'error']);
        }
    }
}
