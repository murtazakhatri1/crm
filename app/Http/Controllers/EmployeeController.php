<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use Illuminate\Validation\Rule;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $all_employees = Employee::orderBy('id','DESC')->paginate(10);
          return view('employees.index')->with('all_employees', $all_employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $all_companies = Company::all();
        return view('employees.create')->with('all_companies', $all_companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'email'=>'required|email|unique:employees',
        'company_id'=>'required',
        'first_name'=>'required',
        'last_name'=>'required',
        'phone'=>'required',
        
        ],

        [
                 'required' => 'Please Fill Out This Field',
                 'email.unique' => 'Email already exist. Please Enter New Email',
        ]);

         $employee =   Employee::create([
            'email' => $request->email,
            'company_id' => $request->company_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,                  
        ]);


       Session::flash('message', 'Successfully created employee!');
       return redirect('employees'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $employee = Employee::find($id);  
      $all_companies = Company::orderBy('id','DESC')->get();
      return view('employees.edit',compact('employee','all_companies'));
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
         $this->validate($request, [
        'email'=>'required|email|unique:employees',
        'company_id'=>'required',
        'first_name'=>'required',
        'last_name'=>'required',
        'phone'=>'required',
        
        ],

        [
                 'required' => 'Please Fill Out This Field',
                 'email.unique' => 'Email already exist. Please Enter New Email',
        ]);

         $employee = Employee::find($id);
         $employee->email = $request->email;
         $employee->company_id = $request->company_id;
         $employee->first_name = $request->first_name;
         $employee->last_name = $request->last_name;
         $employee->phone = $request->phone;

         $employee->save();
         
         Session::flash('message', 'Successfully updated employee!');
         return redirect('employees'); 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        
        Session::flash('message', 'Successfully deleted the employee!');
        return redirect('employees');

    }

    

    
}
