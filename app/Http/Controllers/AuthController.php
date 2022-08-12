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
use Illuminate\Support\Facades\Mail;
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

            if(json_decode($user->json_data)->status != "Active"){

                Auth::logout();

                return redirect()->route('auth-login',['success'=> 'User Need to Communicate with the Admin as Account not Active or Suspended.', 'hasher' => Str::random(40).'-'.Str::random(70), 'time' => time(), 'hasher_ip' => Str::random(10)]);
            }


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
            if ($status == "Suspended" || $status == "Pending"){
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
            if ($status == "Suspended" || $status == "Pending"){
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

    public function forgot_password_api(Request $request){
        $field = $request->validate([
            'email' => 'required|string'
        ]);

        $user = DB::select('select * from users where email=?', [$field['email']]);
        if(isset($user[0])){
            $token = Str::random(20).'-'.Str::random(40).'-'.Str::random(20);
            $delete_token = DB::table('password_resets')->where('email', $user[0]->email)->delete();
            $insert_tken = DB::table('password_resets')->insert(['email' => $user[0]->email, 'token' => $token, 'created_at' => date('Y-m-d H:i:s')]);

            $data = [
                $user[0]->email
            ];

            Mail::send('email.reset-password', [ 'name' => $user[0]->name, 'reset_url' => route('reset-password', ['token' => $token]),'email' => $user[0]->email, 'ip' => $request->ip(), 'facebook_page' => '', 'twitter_account'=>'', 'insta_account'=>''], function($message) use($data){ $message->subject('Reset Password Request - '.env('APP_NAME')); $message->to($data[0]); });

            return redirect()->route('auth-verify-email',['success' => 1, 'email' => base64_encode($field['email'])]);


        } else {
            return redirect()->route('auth-verify-email',['success' => 11, 'email' => $field['email']]);
        }

    }

    public function reset_password_api(Request $request, $token){
        $field = $request->validate([
            'new' => 'required|string',
            'confirm' => 'required|string'
        ]);
        $token_details = DB::select('select * from password_resets where token=?', [$token]);

        if(isset($token_details[0])){

            if($field['new'] == $field['confirm']){


                $a = DB::table('users')->where('email', $token_details[0]->email)->update(['password' => bcrypt($field['new'])]);
                $b = DB::table('password_resets')->where('email', $token_details[0]->email)->delete();
            return redirect()->route('auth-login',[ 'hasher' => Str::random(40), 'time' => time(), 'error'=> 'Password Changed. Now You Can Login with Your New Password', 'hasher_ip' => Str::random(10)]);
            } else {
                return redirect()->route('reset-password',['token'=> $token, 'hasher' => Str::random(40), 'time' => time(), 'error'=> 'Password Didnt Matched. Please Try Again.', 'hasher_ip' => Str::random(10)]);
            }



        } else {
            return redirect()->route('auth-login',[ 'hasher' => Str::random(40), 'time' => time(), 'success'=> 'Bad Token !! No User Found. Please Try Again.', 'hasher_ip' => Str::random(10)]);
        }

    }

    public function all_user_list_api(){
        if(!Auth::check()){
            header("Location: " . route('error'), true, 302);
            exit();

        }

        $role = Auth::user()->role;
        if($role != 'admin' ){
            if( $role != 'super-admin'){
                header("Location: " . route('error'), true, 302);
                exit();
            }
        }

        $users = DB::select('select id,name,avatar,email,username,role,json_data from users ');

        foreach($users as $user){
            $user_decode= json_decode($user->json_data);
            $status = $user_decode->status;
            if ($status == "Suspended" || $status == "Pending"){
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

    public function user_active_by_auth(Request $request, $username){
        if(!Auth::check()){

            header("Location: " . route('error'), true, 302);
            exit();

        }

        if(Auth::user()->role == 'admin' || Auth::user()->role == 'super-admin'){
            
        }


    }

    public function user_suspend(Request $request, $username){
        if(!Auth::check()){
            header("Location: " . route('error'), true, 302);
            exit();

        }

    }
}
