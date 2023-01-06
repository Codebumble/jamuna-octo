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

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        $field = $request->validate([
            'username' => 'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'image.*' => 'mimes:jpeg,png,jpg,svg|max:3080',
            'company'=>'required|string',
            'name' =>'required|string',
            'mobile_number'=>'required|string',
            'gender'=>'required|string',
            'address'=>'required|string',
            'city'=>'required|string',
            'country'=>'required|string',
            'role'=>'required|string',
            'designation'=>'required|string',
            'date_of_birth'=>'required|string',
        ]);
        $db_check= DB::select('select * from users where username=? or email=?',[$field['username'], $field['email']]);

        if(isset($db_check[0])){
            return route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'Either username exist or Email used one time for inviting this person. Try Unique username and Email.', 'hasher_ip' => Str::random(10)]);
        }

        $power_build = [
            'super-admin' => '0',
            'admin' => '1',
            'manager' => '2',
            'employee' => '3',
            'sub-employee' => '4',

          ];

          if($power_build[Auth::user()->role] > $power_build[$field['role']]){
            return route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'Tried to Assign a role which is not approved by the system. Maybe Request were Modified By Third Party. Check Your System ["CYBER_ATTACK_PREVENT_88"]', 'hasher_ip' => Str::random(10)]);
          }
        //keys: birth_certificate_number, nid_number, passport_number

        $json_data= [];
        $json_data['gender'] = $field['gender'];
        $json_data['date_of_birth'] = $field['date_of_birth'];
        $json_data['phone_number'] = $field['mobile_number'] ?? '';
        $json_data['address'] = $field['address'];
        $json_data['city']= $field['city'];
        $json_data['country'] = $field['country'];
        $json_data['birth_certificate_number'] = $request['birth_certificate_number'];
        $json_data['status'] = "Inactive";
        $json_data['nid_number'] = $request['nid_number'];
        $json_data['passport_number'] = $request['passport_number'];
        $json_data['cd_company'] = $request['cd_company'];

        if(Auth::user()->role == 'admin' || Auth::user()->role == 'super-admin'){

            $json_data['isBoardofDirectors'] = $request['isBoardofDirectors'];
            $json_data['isDistrict'] = $request['isDistrict'];

        }



        if($file1 = $request->hasFile('image')) {
            $user1 = $field['username'];
            $file1 = $request->file('image') ;
            $fileName1 = time().'-'.$field['username'].'.'.$file1->getClientOriginalExtension() ;
            $destinationPath1 = public_path().'/profile-images' ;
            $file1->move($destinationPath1,$fileName1);

        }




        $insert_user = DB::table('users')->insert([
            'name' => $field['name'],
            'username' => $field['username'],
            'email' => $field['email'],
            'designation' => $field['designation'],
            'password' => bcrypt($field['password']),
            'role' => $field['role'],
            'company' => $field['company'],
            'avatar' => $fileName1,
            'json_data' => json_encode($json_data),
            'under_ref' => Auth::user()->username,
            'updated_at' => time(),
            'created_at' => time()
        ]);





        return route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'User Added Successfully. But Still Account is not Active for User Verification which will be done by An Admin. Contact With An Admin for Approve the Request.', 'hasher_ip' => Str::random(10)]);;


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

        $json_data->nid_number = $request['nid_number'];
        $json_data->birth_certificate_number = $request['birth_certificate_number'];
        $json_data->passport_number = $request['passport_number'];
        if(!isset($request['isBoardofDirectors']) || $request['isBoardofDirectors'] != "Yes"){
            $request['isBoardofDirectors'] = "No";

        }

        $json_data->isBoardofDirectors = $request['isBoardofDirectors'];

        if(!isset($request['isDistrict']) || $request['isDistrict'] != "Yes"){
            $request['isDistrict'] = "No";
            $json_data->cd_company = "";

        }

        $json_data->isDistrict = $request['isDistrict'];

        if(isset($request['isDistrict']) && $request['isDistrict'] == "Yes"){
            if($request['cd_company'] == ""){
                return redirect()->route('profile-account', ['errors' => 'Correspondence by
                District Can\'t be empty when You checked the "Show in
                Correspondence by District" Checkbox']);
                exit();
            }

            $json_data->cd_company = $request['cd_company'];

        }



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
    server_time_set($request);
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

            $datama = DB::statement('DELETE FROM `codebumble_login_table` WHERE `username`=:username1 AND id NOT IN ( SELECT id FROM ( SELECT id FROM `codebumble_login_table` WHERE `username` =:username2  ORDER BY id DESC LIMIT 13 ) foo )', ['username1' => Auth::user()->username, 'username2' => Auth::user()->username]);
            return redirect()->route('dashboard-analytics');

        }else{
            return redirect()->route('auth-login',['error'=> 'IiiZ2hs1g1vzhEMBdkjMUCPh9YzpRVC8CMojxRar', 'hasher' => Str::random(40).'-'.Str::random(70), 'time' => time(), 'hasher_ip' => Str::random(10)]);
        }
    }

    public function delete_user(){
        check_auth();

        $checker = DB::table('users')->where('username', Auth::user()->username)->delete();
        Auth::logout();
        return json_encode(['data'=> route('auth-login',['success'=> 'Your Account Has Been Deleted. Have A Nice Journy.', 'hasher' => Str::random(40).'-'.Str::random(70), 'time' => time(), 'hasher_ip' => Str::random(10)])]);




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
        $data = DB::select('select * from users where username=?',[$username]);



        $power_build = [
            'super-admin' => '0',
            'admin' => '1',
            'manager' => '2',
            'employee' => '3',
            'sub-employee' => '4',

          ];





          if(isset($data[0])){

            $auther = $data[0];

            if(($power_build[Auth::user()->role] == 0 && $power_build[$auther->role] > 0) || ($power_build[Auth::user()->role] == 1 && $power_build[$auther->role] > 1)){

                $b = json_decode($data[0]->json_data);

            if($b->status != "Active"){
                $b->status = "Active";
            }

            $update_db = DB::table('users')->where('username', $username)->update(['json_data' => json_encode($b)]);

            return redirect()->route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'User Activated as Requested from You. You may inform the Authority with your Reasons or Can Suspend the Account', 'hasher_ip' => Str::random(10)]);



              } else {

                header("Location: " . route('misc-not-authorized'), true, 302);
                exit();
              }



          } else {
            return redirect()->route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'Username Entered for Suspended is Invalid or Modified by Third Party. Please try Again!', 'hasher_ip' => Str::random(10)]);
          }


    }

    public function user_suspend(Request $request, $username){
        if(!Auth::check()){
            header("Location: " . route('error'), true, 302);
            exit();

        }
        $data = DB::select('select * from users where username=?',[$username]);



        $power_build = [
            'super-admin' => '0',
            'admin' => '1',
            'manager' => '2',
            'employee' => '3',
            'sub-employee' => '4',

          ];





          if(isset($data[0])){

            $auther = $data[0];

            if(($power_build[Auth::user()->role] == 0 && $power_build[$auther->role] > 0) || ($power_build[Auth::user()->role] == 1 && $power_build[$auther->role] > 1)){

                $b = json_decode($data[0]->json_data);

            if($b->status == "Active"){
                $b->status = "Pending";
            }

            $update_db = DB::table('users')->where('username', $username)->update(['json_data' => json_encode($b)]);

            return redirect()->route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'User Suspended as Requested from You. You may inform the Authority with your Reasons or Can reactive the Account', 'hasher_ip' => Str::random(10)]);



              } else {

                header("Location: " . route('misc-not-authorized'), true, 302);
                exit();
              }



          } else {

            return redirect()->route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'Username Entered for Suspended is Invalid or Modified by Third Party. Please try Again!', 'hasher_ip' => Str::random(10)]);

          }

    }

    public function user_report_api(Request $request, $username){

        if(!Auth::check()){
            header("Location: " . route('error'), true, 302);
            exit();

        }

        $data = DB::select('select * from users where username=?',[$username]);

        if(isset($data[0])){
            $check = DB::select('select * from codebumble_user_report_list where to_user=? and from_user=?',[$username, Auth::user()->username]);

            if(!isset($check[0])){

                $report_issue = DB::table('codebumble_user_report_list')->insert([
                    'from_user' => Auth::user()->username,
                    'from_email' => Auth::user()->email,
                    'to_user' => $username,
                    'status' => 'active',
                    'updated_at' => time(),
                    'created_at' => time()

            ]);

            return redirect()->route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'You have report about this user Succesfully. Admin will Take Action about this User soon.', 'hasher_ip' => Str::random(10)]);

            } else {
                return redirect()->route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'You have already reported about this user which is did\'nt solved yet. Contact with the Admin for More!!', 'hasher_ip' => Str::random(10)]);
            }

        } else {
            return redirect()->route('profile-account',[ 'hasher' => Str::random(40), 'time' => time(), 'errors'=> 'Username Entered for Report is Invalid or Modified by Third Party. Please try Again!', 'hasher_ip' => Str::random(10)]);
        }

    }

    public function company_user_list_api(){
        check_auth();

        $datam = DB::select('select id,name,avatar,email,username,role,json_data,designation from users where company=?', [Auth::user()->company]);


        foreach($datam as $user){
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

        return json_encode(['data' => $datam]);
    }
}
