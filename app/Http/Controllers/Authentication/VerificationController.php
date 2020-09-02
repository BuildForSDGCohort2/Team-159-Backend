<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    //


public function verify($user_id, Request $request) {
    if (!$request->hasValidSignature()) {
        return response()->json(["msg" => "Invalid/Expired url provided."], 401);
    }

    $user = User::findOrFail($user_id);

    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    return redirect()->to('/');
}

public function resend() {
    if (auth()->user()->hasVerifiedEmail()) {
        return response()->json(["msg" => "Email already verified."], 400);
    }

    auth()->user()->sendEmailVerificationNotification();

    return response()->json(["msg" => "Email verification link sent to your email id"]);
}

// }
use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->only('resend');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }


}

