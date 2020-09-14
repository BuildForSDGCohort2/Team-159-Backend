<?php

namespace App\Http\Controllers;

use App\dispatcher\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    

        // public function controller(){
        //     $this->middleware(['auth:api']);
        // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function storeCompany(Request $request)
    {
      $validate =  [
            'company_name'=>'required|string|max:50',
            'company_description' =>'required',
            'telephone_number'=>'required',
            'company_address'=>'required'
        ];
        $validator = Validator::make($request->all(), $validate);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);

        }
        $company = new Company;
        $company->company_name = $request->input('company_name');
        $company->company_description = $request->input('company_description');
        $company->telephone_number = $request->input('telephone_number');
        $company->company_address = $request->input('company_address');
        $company->save();
        return response()->json([
            "message" =>"company added successfuly"
        ], 201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function showCompanies(Request $request)
        {
            $company = Company::get()->toJson(JSON_PRETTY_PRINT);
            return response($company, 200);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(Request $request, Company $company)
    {

        $company->company_name = $request->input('company_name');
        $company->company_description = $request->input('company_description');
        $company->telephone_number =$request->input('telephone_number');
        $company->company_address = $request->input('company_address');
        $company->save();
        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function deleteCompany($id)
    {
        $company = Company::find($id);
        $company->delete();
    
            return response()->json([
                "message" =>"company deleted successfuly"
            ], 201);;
        
        // return response()->json('company not found', 404);
        
    }
}
