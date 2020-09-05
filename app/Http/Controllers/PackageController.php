<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\PackageController;
use App\package\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
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
    public function createPackages(Request $request)
    {
        // $package = new Package;
        // $package->package_name = $request->package_name;
        // $package->package_description = $request->package_description;
        // $package->package_weight = $request->package_weight;
        // $package->package_category = $request->package_category;
        // $package->package_pickup_address = $request->package_pickup_address;
        // $package->package_delivery_address = $request->package_delivery_address;
        // $package->save();
        // return response()->json([
        //     "message" =>"package added successfuly"], 201);
    
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = Package::where(['user_id', Auth()->user()->id])->all();
        $validator = Validator::make($request->all(),[
        'package_name'=>'required|string|max:50',
        'package_description'=>'required',
        'package_weight'=>'required',
        'package_category'=>'required',
        'package_pickup_address'=>'required',
        'package_delivery_address'=>'required'
        ]);
        if ($validator->fails()){
            return response()->json([
                "message" =>""], 400);
        }
        $package = new Package;
        $package->package_name = $request->input('package_name');
        $package->package_description = $request->input('package_description');
        $package->package_weight = $request->input('package_weight');
        $package->package_category = $request->input('package_category');
        $package->package_pickup_address = $request->input('package_pickup_address');
        $package->package_delivery_address = $request->input('package_delivery_address');
        $package->company_id = $request->input('company_id');
        $package->status_id = $request->input('status_id');
        $package->user_id = Auth()->user()->id;
        $package->save();
        return response()->json([
            "message" =>"package added successfuly"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function showAllPackages(Package $package)
    {
        $packages = Package::get()->toJson(JSON_PRETTY_PRINT);
        return response($packagess, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        
    }
}
