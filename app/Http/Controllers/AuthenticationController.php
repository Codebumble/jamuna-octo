<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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

        return view('/content/authentication/auth-register', ['pageConfigs' => $pageConfigs]);
    }


    // Forgot Password basic
    public function forgot_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/content/authentication/auth-forgot-password', ['pageConfigs' => $pageConfigs]);
    }


    // Reset Password basic
    public function reset_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/content/authentication/auth-reset-password', ['pageConfigs' => $pageConfigs]);
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
