<?php
namespace App\Http\Controllers\Api;
use App\Transformers\Json;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */
    use SendsPasswordResetEmails;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // dd('asdasd');
        $this->middleware('guest');
    }
    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getResetToken(Request $request)
    {
       // dd($request->all());
       // $this->validate($request, ['email' => 'required|email']);
        if (!empty($request->email)) {
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                return response()->json(['status'=>'false','message' =>
                    "We can't find a user with that e-mail address"]);
            }
            $token = $this->broker()->createToken($user);
            return response()->json(['status'=>'true','token' => $token]);
        }else{
            return response()->json(['status'=>'false','message' => "No Email given"]);
        }
    }
}