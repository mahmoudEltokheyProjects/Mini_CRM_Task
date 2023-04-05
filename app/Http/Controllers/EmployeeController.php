<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesValidation;
use App\Models\Company;
use App\Models\Employee;
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
        // +++++++++ Get "All employees" data and "order them" Descending by "id" And each page will has "PAGINATION_COUNT" in each page  +++++++++
        $employees = Employee::select('*')->orderby('id','ASC')->paginate(PAGINATION_COUNT);
        return view('employees.employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get "All Companies"
        $allCompanies = Company::all();
        // Go To "employees/add_employee.blade" page
        return view('employees.add_employee',compact('allCompanies'));
    }
    // ++++++++++++++++++++++ store() method : store "employees data" ++++++++++++++++++++++
    public function store(EmployeesValidation $request)
    {
        Employee::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone ,
            'email' => $request->email ,
            'company_id' => $request->company
        ]);
        // make session called "Add" and store message 'تم اضافة الموظف بنجاح'
        session()->flash('Add', 'تم اضافة الموظف بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
