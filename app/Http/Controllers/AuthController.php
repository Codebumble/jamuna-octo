<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Validator;
use File;
use DB;
use Sinergi\BrowserDetector\Browser;
use Sinergi\BrowserDetector\Os;

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

    public function user_edit(Request $request){
        $field=$request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'designation' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'date_of_birth' => 'required|string',
            'city' => 'required|string',
        ]);
        $json_data = json_decode(Auth::user()->json_data);

        $json_data->gender = $field['gender'];
        $json_data->date_of_birth = $field['date_of_birth'];
        $json_data->phone_number = $field['phone_number'];
        $json_data->address = $field['address'];
        $json_data->address = $field['city'];
        $json_data->country = $field['country'];
        
        

        if(Auth::check()){
            $username = DB::table('users')->where('username', Auth::user()->username)->update(['name' => $field['name'], 'designation' => $field['designation'], 'json_data' => json_encode($json_data)]);

            return redirect()->route('profile-account', ['status' => 'Updated']);
            
        } else {
            return redirect()->route('auth-login', [ 'hasher' => Str::random(40), 'time' => time(), 'error'=> 2, 'hasher_ip' => Str::random(10)]);
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

            $os= new Os();
            $browser = new Browser();
            date_default_timezone_set(env('TIMEZONE'));
            
            $updated = DB::table('codebumble_login_table')->insert(['username' => $user->username, 'ip' => $request->ip(), 'browser' => $browser->getName(), 'browser_full' => $browser->getName().' '.$browser->getVersion(), 'os' => $os->getName().' '.$os->getVersion(), 'date' => date('d-M, Y'), 'time' => date('h:i a'), 'updated_at' => time(), 'created_at' => time()]);
            return redirect()->route('dashboard-ecommerce');

        }else{
            return redirect()->route('auth-login',['error'=> 'IiiZ2hs1g1vzhEMBdkjMUCPh9YzpRVC8CMojxRar', 'hasher' => Str::random(40).'-'.Str::random(70), 'time' => time(), 'hasher_ip' => Str::random(10)]);
        }
    }


    /**
    * Get the authenticated User
    *
    * @return [json] user object
    */

    public function profile_image_upload(Request $request){

        $request->validate([
            'profile_image.*' => 'mimes:jpeg,png,jpg,svg|max:3080',
        ]);
        if(Auth::check()){
            if($file = $request->hasFile('profile_image')) {
                $user = Auth::user()->username;
                $file = $request->file('profile_image') ;
                $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
                $destinationPath = public_path().'/profile-images' ;
                $file->move($destinationPath,$fileName);
                DB::table('users')->where('username', $user)->update(['avatar'=>$fileName]);
                return redirect()->route('profile-security',['success' => 1]);
            }
        } else {
            return redirect()->route('auth-login'); 
        }
    }
    public function user(Request $request){
        return response()->json($request->user());
    }

    public function profile_visitor_under_ref($username){
        
        $users = DB::select('select id,name,avatar,email,username,role,json_data from users where under_ref=?', [$username]);

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
    public function auth_reset_password(Request $request){
        $field=$request->validate([
            'current' => 'required|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string',
        ]);

        if(Auth::check()){
        $user = User::where('username', Auth::user()->username)->first();

        if($field['password'] != $field['confirm_password']){
            return redirect()->route('profile-security', ['error' => 2]);
        }

        if(Hash::check($field['current'], $user->password)){
            $update = DB::table('users')->where('username', Auth::user()->username)->update(['password' =>bcrypt($field['password'])]);
            return redirect()->route('profile-security', ['success' => 1]);
        } else {
            return redirect()->route('profile-security', ['error' => 1]);
        }
    } else {
        return redirect()->route('auth-login');
    }

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
