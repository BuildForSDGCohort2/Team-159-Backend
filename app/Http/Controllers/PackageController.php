<?php
    namespace App\Http\Controllers;
    use App\package\Package;
    use Illuminate\Http\Request;

    class PackageController extends Controller
    {

        public function controller(){
            $this->middleware(['auth:api', 'client']);
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //$packages = Package::get()->toJson(JSON_PRETTY_PRINT);
            $packages = auth()->user()->packages()->get()->toJson(JSON_PRETTY_PRINT);
            return response($packages, 200);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(Request $request)
        {

        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //validate model
            $request->validate([
                'package_name'=>'required|string|max:50',
                'package_description'=>'required|min:10',
                'package_weight'=>'required|numeric',
                'package_category'=>'required',
                'package_pickup_address'=>'required|min:10',
                'package_delivery_address'=>'required|min:10',
                'company_id' => '',
            ]);

            //instantiate and create the model
            $package = new Package;
            $package->package_name = $request->input('package_name');
            $package->package_description = $request->input('package_description');
            $package->package_weight = $request->input('package_weight');
            $package->package_category = $request->input('package_category');
            $package->package_pickup_address = $request->input('package_pickup_address');
            $package->package_delivery_address = $request->input('package_delivery_address');
            $package->company_id = $request->input('company_id');
            $package->user()->associate(auth()->user()); //connect product to models

            $package->save();
            return response()->json([
                "message" =>"package added successfuly"
            ], 201);
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\package\Package  $package
         * @return \Illuminate\Http\Response
         */
        public function show(Package $package)
        {
            //check for authorization
            if(!auth()->user()->packages->contains('id', $package->id)){
                return response()->json(['message', 'Unauthorized'], 401);
            }

            return response()->json($package, 200);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Package  $package
         * @return \Illuminate\Http\Response
         */
        public function edit(Package $package)
        {


        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\package\Package  $package
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Package $package)
        {
            if(!auth()->user()->packages->contains('id', $package->id)){
                return response()->json(['message', 'Unauthorized'], 401);
            }

            $request->validate([
                'package_name'=>'required|string|max:50',
                'package_description'=>'required|min:10',
                'package_weight'=>'required|numeric',
                'package_category'=>'required',
                'package_pickup_address'=>'',
                'package_delivery_address'=>''
            ]);
            
            //update package variable
            $package->package_name = $request->input('package_name');
            $package->package_description = $request->input('package_description');
            $package->package_weight = $request->input('package_weight');
            $package->package_category = $request->input('package_category');
            $package->package_pickup_address = $request->input('package_pickup_address');
            $package->package_delivery_address = $request->input('package_delivery_address');
            $package->save();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Package  $package
         * @return \Illuminate\Http\Response
         */
        public function destroy(Package $package)
        {
            //if package status is no more pending, package cannot be destroyed
            // Package::where
        }
    }
