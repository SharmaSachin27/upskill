<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::join('company', 'employee.company_id', '=', 'company.id')->select('employee.*', 'company.name')->get();
        //$employees = Employee::with('getCompany')->get();
        return view('viewEmployee')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view('manageEmployee')->with('company', $company);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'firstname' =>  'required',
            'lastname' => 'required',
            'email' => 'required|unique:employee',
            'company_id' => 'required'
        ]);
        $input = $request->all();
        Employee::create($input);
        Session::put('statusCode', 'success');
        return redirect()->route('employees.index')->with('status', 'Record Addedd Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $company = Company::all();
        return view('manageEmployee')->with(['employee' => $employee, 'company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employee = Employee::find($id);
        $request->validate([
            'firstname' =>  'required',
            'lastname' => 'required',
            'email' => 'required|unique:employee,email,' . $id . ',id',
            'company_id' => 'required'
        ]);
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->company_id = $request->company_id;
        $employee->save();
        Session::put('statusCode', 'success');
        return redirect()->route('employees.index')->with('status', 'Record Addedd Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::find($id);
        $employee->delete();
        Session::put('statusCode', 'success');
        return redirect()->route('employees.index')->with('status', 'Record Deleted Successfully!');
    }
}
