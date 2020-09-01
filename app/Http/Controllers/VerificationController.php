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


// public function verify($user_id, Request $request) {
//     if (!$request->hasValidSignature()) {
//         return response()->json(["msg" => "Invalid/Expired url provided."], 401);
//     }

//     $user = User::findOrFail($user_id);

//     if (!$user->hasVerifiedEmail()) {
//         $user->markEmailAsVerified();
//     }

//     return redirect()->to('/');
// }

// public function resend() {
//     if (auth()->user()->hasVerifiedEmail()) {
//         return response()->json(["msg" => "Email already verified."], 400);
//     }

//     auth()->user()->sendEmailVerificationNotification();

//     return response()->json(["msg" => "Email verification link sent on your email id"]);
// }

// }
use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.api')->only('resend');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

/**
*@param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*
* @throws \Illuminate\Auth\Access\AuthorizationException
*/
public function verify(Request $request)
{
   if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
       throw new AuthorizationException;
   }

   if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
       throw new AuthorizationException;
   }

   if ($request->user()->hasVerifiedEmail()) {
       return $request->wantsJson()
                   ? new Response('already verified', 204)
                   : redirect($this->redirectPath());
   }

   if ($request->user()->markEmailAsVerified()) {
       event(new Verified($request->user()));
   }

   if ($response = $this->verified($request)) {
       return $response;
   }

   return $request->wantsJson()
               ? new Response('successfully verified', 204)
               : redirect($this->redirectPath())->with('verified', true);
}

/**
* The user has been verified.
*
* @param  \Illuminate\Http\Request  $request
* @return mixed
*/
protected function verified(Request $request)
{
   //
}

/**
* Resend the email verification notification.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function resend(Request $request)
{
   if ($request->user()->hasVerifiedEmail()) {
       return $request->wantsJson()
                   ? new Response('already verified', 204)
                   : redirect($this->redirectPath());
   }

   $request->user()->sendEmailVerificationNotification();

   return $request->wantsJson()
               ? new Response('email sent', 202)
               : back()->with('resent', true);
}
}

