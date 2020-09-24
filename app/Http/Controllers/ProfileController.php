<?php

namespace App\Http\Controllers;
use App\Profile;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request, Profile $profile){        
    }

    public function show(Profile $profile){
        //must be authorized
        if(auth()->user()->id != $profile->user()->id){
            return response()->json(["message" => "Unauthorized"]);
        }

        return response()->json($profile, 200);
    }
}
