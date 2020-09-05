<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        return view('authenticate.index');
    }
}
