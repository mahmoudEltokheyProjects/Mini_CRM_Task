<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesValidation;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\UploadImageTrait;

class CompanyController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // +++++++++ Get "All companies" data and "order them" Descending by "id" And each page will has "PAGINATION_COUNT" in each page  +++++++++
        $companies = Company::select('*')->orderby('id','ASC')->paginate(PAGINATION_COUNT);
        return view('companies.companies',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.add_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesValidation $request)
    {
        // +++++++++++++ Check if "company" upload image ++++++++++++++++++++
        if($request->hasFile('pic'))
        {

            /* Note :
                "uuid" is 36-character alphanumeric string that can be used to identify information
                UUID => Universally Unique Identifier
                we use "uuid" to avoid collisions that happens when you "upload two images" have the same name
            */
            // Call "uploadImage()" method from "app/Trait/UploadImageTrait" trait To "upload logo"
            $path = $this->uploadImage($request,'imgs');
            // insert "All data" in "companies table"
            Company::create([
                'name' => $request->name ,
                'email' => $request->email ,
                'website' => $request->website,
                'pic' => $path ,
            ]);
            // make session called "Add" and store message 'تم اضافة الشركة بنجاح'
            session()->flash('Add', 'تم اضافة الشركة بنجاح');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
