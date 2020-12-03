<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$employees = Employee::latest()->paginate(5);
        $employees = Employee::join('company', 'company.id', '=', 'employee.company_id')
                            ->select('employee.*', 'company.name as company_name')
                            ->paginate(5);

        return view('employee.index',compact('employees'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'gender' => 'required',
            'company_id' => 'required',
            'title' => 'required',
        ]);
  
        Employee::create($request->all());
   
        return redirect()->route('employee.index')
                        ->with('success','Employee created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        
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
        return view('employee.edit',compact('employee', 'companies'));
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
            //dd($request);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'gender' => 'required',
            'company_id' => 'required',
            'title' => 'required',
        ]);
  
        $employee->update($request->all());
   
        return redirect()->route('employee.index')
                        ->with('success','Employee Updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
  
        return redirect()->route('employee.index')
                        ->with('success','Employee deleted successfully');
    }

}
