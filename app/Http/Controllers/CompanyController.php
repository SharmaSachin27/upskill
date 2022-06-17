<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = Company::all();
        return view('viewCompany')->with('company', $company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
            'name' =>  'required',
            'email' => 'required',
            'logo' => 'required|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ],
        [
            'logo.required' => "you have to choose company logo it required.",
            'logo.dimensions' => "you have to choose image minimum 100 x 100 dimension."
        ]);
        $input = $request->all();
        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('company_logos'), $filename);
        }
        $input['logo'] = $filename;
        Company::create($input);
        return redirect()->route('companies.index')->with('flash_message', 'Record Addedd Successfully!');
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
        return redirect()->route('companies.index');
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
        $company = Company::find($id);
        return  view('manageCompany')->with('company', $company);
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
        $company = Company::find($id);
        $request->validate([
            'name' =>  'required',
            'email' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ],
        [
            'logo.dimensions' => "you have to choose image minimum 100 x 100 dimension."
        ]);
        $filename = null;
        if($request->file('logo') !== null){
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('company_logos'), $filename);
            File::delete(public_path("company_logos/" . $request->oldlogo));
        } else {
            $filename = $request->oldlogo;
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $filename;
        $company->save();
        return redirect()->route('companies.index')->with('flash_message', 'Record Updated Successfully!');

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
        $company = Company::find($id);
        File::delete(public_path("company_logos/" . $company->logo));
        $company->delete();
        return redirect()->route('companies.index')->with('flash_message', 'Record Deleted Successfully!');
    }
}
