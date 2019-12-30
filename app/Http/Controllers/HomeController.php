<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
Use App\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $allcompanies = Company::count();
        $allemployees = Employee::count();
        return view('home',compact('allcompanies','allemployees'));
    }
    
}
