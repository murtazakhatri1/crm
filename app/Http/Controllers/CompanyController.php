<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Image;
use Illuminate\Validation\Rule;
use Session;
use App\Mail\Mailtrap;
use Illuminate\Support\Facades\Mail;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $all_companies = Company::orderBy('id','DESC')->paginate(10);
          return view('companies.index')->with('all_companies', $all_companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
        'email'=>'required|email|unique:companies',
        'name'=>'required',
        'logo'=>'image|required|mimes:jpeg,png,jpg,gif,svg',
        ],
             [
                 'required' => 'Please Fill Out This Field',
                 'email.unique' => 'Email already exist. Please Enter New Email',
             ]);

        if($request->hasFile('logo')) {
        //get filename with extension
        $filenamewithextension = $request->file('logo')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('logo')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('logo')->storeAs('public/logo', $filenametostore);
        // $request->file('logo')->storeAs('public/logo/thumbnail', $filenametostore);
 
        //Resize image here
        $thumbnailpath = public_path('storage/logo/'.$filenametostore);
        
        $img = Image::make($thumbnailpath)->resize(100, 100)->save($thumbnailpath);
      }

         $company =   Company::create([
            'email' => $request->email,
            'name' => $request->name,
            'logo' => $filenametostore,
                  
        ]);

        
       
       
       if($company)
       {
         Mail::to('cloverpakistan@gmail.com')->send(new Mailtrap()); 
       }

       
       Session::flash('message', 'Successfully created comapny!');
       return redirect('companies');


   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit')->with('company', $company);
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
        // dd($request->all());
         $this->validate($request, [
        'email'=>'required|email|unique:companies',
        'name'=>'required',
        ],
             [
                 'required' => 'Please Fill Out This Field',
                 'email.unique' => 'Email already exist. Please Enter New Email',
             ]);

        if($request->hasFile('logo')) {
        //get filename with extension
        $filenamewithextension = $request->file('logo')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('logo')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('logo')->storeAs('public/logo', $filenametostore);
        // $request->file('logo')->storeAs('public/logo/thumbnail', $filenametostore);
 
        //Resize image here
        $thumbnailpath = public_path('storage/logo/'.$filenametostore);
        
        $img = Image::make($thumbnailpath)->resize(100, 100)->save($thumbnailpath);
      }

            $company = Company::find($id);
            $company->email = $request->email;
            $company->name = $request->name;

            if(isset($request->logo)){
              $company->logo =  $filenametostore;
             }

            $company->save();


                  
       Session::flash('message', 'Successfully updated comapny!');
       return redirect('companies');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        
        Session::flash('message', 'Successfully deleted the comapny!');
        return redirect('companies');

    }

     
}
