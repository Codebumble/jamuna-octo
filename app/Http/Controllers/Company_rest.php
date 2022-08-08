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
        $check_name = Db::table('codebumble_company_list')->where('name', $field['name'])->first();
        if(isset($check_name->name)){

            return redirect()->route('add-company',['exist' => 1]);

        }


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

        $database_update = DB::table('codebumble_company_list')->insert(['name'=> $field['name'], 'section' => $field['section'], 'description' => $field['description'], 'establish_date' => $field['description'], 'json_data' => $json_encode, 'image' => $fileName, 'created_at' => time(), 'updated_at' => time()]);

        return redirect()->route('add-company',['status' => 1]);


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
        //$name_list = DB::table('codebumble_company_list')->where(['name' => $field['name']])->first();

            // loop for checking section name already exist or not



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

    public function auth_view_add_company()
    {


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Site Settings"], ['name' => "Add Company"]
        ];

        $data = DB::table('codebumble_general')->where('code_name', 'sections')->first();


        return view('/content/company/add_company', [
            'breadcrumbs' => $breadcrumbs, 'sections' => json_decode($data->value)
        ]);
    }


    // Section API STARTED
    public function add_section(Request $request){

        $field = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);



        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        $last_data = DB::table('codebumble_general')->where('code_name', 'sections')->first();

        if(isset($last_data->value)){

                $data = json_decode($last_data->value);
                $checker = false;
            // loop for checking section name already exist or not
                foreach($data as $datam){
                    if($datam->name == $field['name'] ){
                        $checker = true;
                    }
                }

                if($checker){
                    return redirect()->route('add-section',['exist' => 1]);
                }
                array_push($data, ['name' => $field['name'], 'description' => $field['description']]);
                $data = json_encode($data);
                $database = DB::table('codebumble_general')->where('code_name', 'sections')->update(['value' => $data]);
        } else {
                $data = [];
                array_push($data, ['name' => $field['name'], 'description' => $field['description']]);
                $data = json_encode($data);
                $database = DB::table('codebumble_general')->insert(['code_name'=> 'sections', 'value' => $data]);
        }



        return redirect()->route('add-section',['status' => 1]);


    }

    public function auth_view_add_section()
    {


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Site Settings"], ['name' => "Add Section"]
        ];

        return view('/content/company/add_section', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
