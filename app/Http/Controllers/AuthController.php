<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use DB;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string',
        ]);

        $user = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if($user->save()){
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return response()->json([
            'message' => 'Successfully created user!',
            'accessToken'=> $token,
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }
    }


    /**
    * Login user and create token
    *
    * @param  [string] email
    * @param  [string] password
    * @param  [boolean] remember_me
    */

    public function login(Request $request){
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
        ? 'email' 
        : 'username';

    $request->merge([
        $login_type => $request->input('login')
    ]);

        if(Auth::attempt($request->only($login_type, 'password'))){
            $user = Auth::user();
            // return response()->json([
            //     'message' => 'Successfully logged in! Redirecting',
            // ],200);

            return redirect()->route('dashboard-ecommerce')->with('success', 'Successfully logged in!');

        }else{
            return back()->with('error', 'Provide proper details');
        }
    }


    /**
    * Get the authenticated User
    *
    * @return [json] user object
    */
    public function user(Request $request){
        return response()->json($request->user());
    }


    /**
    * Logout user (Revoke the token)
    *
    * @return [string] message
    */
    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json([
        'message' => 'Successfully logged out'
        ]);
    }

    public function under_ref(Request $request){
        $auth = Auth::user();
        $users = DB::select('select id,name,avatar,email,username,role,json_data from users where under_ref=?', [$auth->username]);

        foreach($users as $user){
            $user_decode= json_decode($user->json_data);
            $status = $user_decode->status;
            if ($status == "Pending"){
                $status = 0; 
            } else if($status == "Active"){
                $status = 1;
            } else if ($status == "Inactive"){
                $status = 2;
            }
            $user->json_data = $status;
           
        }
        
        return json_encode(["data"=>$users]);


    }
}
