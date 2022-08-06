<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class Company_rest extends Controller
{
    public function add_company(Request $request){

        $field = $request->validate([
            'name' => 'required|string',
            'section' => 'required|string',
            'description' => 'required|string',
            'establish_date' => 'required|string',
            'support_phone_number' => 'required|string',
            'support_email' => 'required|string',
            'ceo_of_the_company' => 'required|string',
            'address' => 'required|string',
            'image.*' => 'mimes:jpeg,png,jpg,svg|max:3080'
        ]);
        // add longitute,latitude, wesite, facebook, instagram



        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        if(!isset($request['longitute'])){
            $request['longitute'] = 'N/A';
        }

        if(!isset($request['latitude'])){
            $request['latitude'] = 'N/A';
        }

        if(!isset($request['website'])){
            $request['website'] = 'N/A';
        }

        if(!isset($request['facebook'])){
            $request['facebook'] = 'N/A';
        }

        if(!isset($request['instagram'])){
            $request['instagram'] = 'N/A';
        }

        $json_encode = json_encode([
            'address' => $field['address'],
            'added_by' => Auth::user()->username,
            'ceo_of_the_company' => $field['ceo_of_the_company'],
            'latitude' => $request['latitude'],
            'longitute' => $request['longitut'],
            'support_phone_number' => $field['support_phone_number'],
            'support_email' => $field['support_email'],
            'website' => $request['website'],
            'facebook' => $request['website'],
            'instagram' => $request['instagram']
        ]);

        if($file = $request->hasFile('image')) {
            $user = Auth::user()->username;
            $file = $request->file('image') ;
            $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/company-images' ;
            $file->move($destinationPath,$fileName);
        }

        $database_update = DB::table('codebumble_company_list')->insert(['name'=> $field['name'], 'section' => $field['section'], 'description' => $field['description'], 'establish_date' => $field['description'], 'json_data' => $field['json_data'], 'image' => $fileName]);

        return redirect()->route('',['status' => 1]);


    }

    public function edit_company(Request $request){
        $field = $request->validate([
            'name' => 'required|string',
            'section' => 'required|string',
            'description' => 'required|string',
            'establish_date' => 'required|string',
            'support_phone_number' => 'required|string',
            'support_email' => 'required|string',
            'ceo_of_the_company' => 'required|string',
            'address' => 'required|string'
        ]);
        // add longitute,latitude, wesite, facebook, instagram



        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        if(!isset($request['longitute'])){
            $request['longitute'] = 'N/A';
        }

        if(!isset($request['latitude'])){
            $request['latitude'] = 'N/A';
        }

        if(!isset($request['website'])){
            $request['website'] = 'N/A';
        }

        if(!isset($request['facebook'])){
            $request['facebook'] = 'N/A';
        }

        if(!isset($request['instagram'])){
            $request['instagram'] = 'N/A';
        }

        $json_encode = json_encode([
            'address' => $field['address'],
            'added_by' => Auth::user()->username,
            'ceo_of_the_company' => $field['ceo_of_the_company'],
            'latitude' => $request['latitude'],
            'longitute' => $request['longitut'],
            'support_phone_number' => $field['support_phone_number'],
            'support_email' => $field['support_email'],
            'website' => $request['website'],
            'facebook' => $request['website'],
            'instagram' => $request['instagram']
        ]);

        if($file = $request->hasFile('image')) {
            $user = Auth::user()->username;
            $file = $request->file('image') ;
            $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/company-images' ;
            $file->move($destinationPath,$fileName);
        } else {
            return redirect()->route('',['error' => 1]);
        }

        $database_update = DB::table('codebumble_company_list')->where(['name' => $field['name']])->update(['name'=> $field['name'], 'section' => $field['section'], 'description' => $field['description'], 'establish_date' => $field['description'], 'json_data' => $field['json_data']]);

        return redirect()->route('',['status' => 1]);

    }

    public function delete_company(Request $request){
        $field = $request->validate([
            'name' => 'required|string'
        ]);

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        $b = DB::table('codebumble_company_list')->where('id', $field['id'])->delete();


    }

    public function edit_company_image(Request $request){

        $field = $request->validate([
            'image.*' => 'mimes:jpeg,png,jpg,svg|max:3080'
        ]);

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        if($file = $request->hasFile('image')) {
            $user = Auth::user()->username;
            $file = $request->file('image') ;
            $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/company-images' ;
            $file->move($destinationPath,$fileName);
        } else {
            return redirect()->route('',['error' => 1]);
        }

        $database_update = DB::table('codebumble_company_list')->where(['name' => $field['name']])->update(['image' => $fileName]);

        return redirect()->route('',['status' => 1]);

    }

    public function view_all_company(){

        if(!Auth::check()){
            header("Location: " . route('profile-account'), true, 302);
            exit();

        }

        $database_details = DB::select('select * from codebumble_company_list');

        return $database_details;





    }

    public function view_single_company(Request $request){

        $field = $request->validate([
            'name' => 'required|string'
        ]);

        if(!Auth::check()){
            header("Location: " . route('profile-account'), true, 302);
            exit();

        }

        $database_details = DB::select('select * from codebumble_company_list where name=?',[$field['name']]);

        return $database_details[0];

    }
}
