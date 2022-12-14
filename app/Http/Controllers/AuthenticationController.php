<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthenticationController extends Controller
{
    // Login basic
    public function login(Request $request)
    {
        $pageConfigs = ['blankPage' => true];

        return view('/content/authentication/auth-login', ['pageConfigs' => $pageConfigs]);
    }

    // Register basic
    public function register()
    {
        $pageConfigs = ['blankPage' => true];

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        $companys = DB::table('codebumble_company_list')->select('name')->get();



        return view('/content/apps/user/add-user', ['pageConfigs' => $pageConfigs, 'companys' => $companys]);
    }


    // Forgot Password basic
    public function forgot_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/content/authentication/auth-forgot-password', ['pageConfigs' => $pageConfigs]);
    }



    // Reset Password basic
    public function reset_password($token)
    {
        $pageConfigs = ['blankPage' => true];
        $user = DB::select('select * from password_resets where token= ?', [$token]);

        if(isset($user[0])){
            return view('/content/authentication/auth-reset-password', ['pageConfigs' => $pageConfigs, 'token' => $token]);
        } else {
            return view('/content/miscellaneous/error', ['pageConfigs' => $pageConfigs]);
        }


    }


    // email verify basic
    public function verify_email($email)
    {
        $pageConfigs = ['blankPage' => true];

        return view('/content/authentication/auth-verify-email', ['pageConfigs' => $pageConfigs,  'email' => base64_decode($email)]);
    }


    // two steps basic
    public function two_steps()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/content/authentication/auth-two-steps', ['pageConfigs' => $pageConfigs]);
    }
}
