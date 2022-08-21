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
            'products' => 'required|string',
            'production-cap' => 'required|string',
            'manpower' => 'required|string',
            'support_phone_number' => 'required|string',
            'support_email' => 'required|string',
            'ceo_of_the_company' => 'required|string',
            'address' => 'required|string',
            'image.*' => 'mimes:jpeg,png,jpg,svg|max:3080',
			'short-details' => 'required|string',
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




        $json_encode = json_encode([
            'address' => $field['address'],
            'added_by' => Auth::user()->username,
            'ceo_of_the_company' => $field['ceo_of_the_company'],
            'latitude' => $request['latitude'],
            'longitute' => $request['longitute'],
            'support_phone_number' => $field['support_phone_number'],
            'support_email' => $field['support_email'],
            'website' => $request['website'],
            'facebook' => $request['website'],
            'instagram' => $request['instagram'],
			'linkedin' => $request['linkedin'],
            'ceo_username' => $request['ceo_username']
        ]);

        if($file = $request->hasFile('image')) {
            $user = Auth::user()->username;
            $file = $request->file('image') ;
            $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/company-images' ;
            $file->move($destinationPath,$fileName);
        }

        $database_update = DB::table('codebumble_company_list')->insert(
			[
				'name'=> $field['name'],
				'section' => $field['section'],
				'description' => $field['description'],
				'establish_date' => $field['establish_date'],
				'products' => $field['products'],
				'production_cap' => $field['production-cap'],
				'manpower' => $field['manpower'],
				'json_data' => $json_encode,
				'image' => $fileName,
				'created_at' => time(),
				'updated_at' => time(),
				'short_details' => $field['short-details']
				]
		);

        return redirect()->route('add-company',['status' => 1]);


    }


	// edit company

    public function edit_company(Request $request, $id){
        $field = $request->validate([
            'section' => 'required|string',
            'description' => 'required|string',
            'establish_date' => 'required|string',
            'support_phone_number' => 'required|string',
            'products' => 'required|string',
            'production-cap' => 'required|string',
            'manpower' => 'required|string',
            'support_email' => 'required|string',
            'ceo_of_the_company' => 'required|string',
            'address' => 'required|string',
			'image.*' => 'mimes:jpeg,png,jpg,svg|max:3080',
			'short-details' => 'required|string',

        ]);
        // add longitute,latitude, wesite, facebook, instagram
		//aikhn a error ditese



        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

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
            'instagram' => $request['instagram'],
			'linkedin' => $request['linkedin'],
            'ceo_username' => $request['ceo_username']
        ]);

        $a = DB::table('codebumble_company_list')->where('id', $id)->first();

        if($file = $request->hasFile('image')) {
            $check = $request->validate([
                'image.*' => 'mimes:jpeg,png,jpg,svg|max:3080'
            ]);

            $unlink_path= public_path().'/company-images/'.$a->image;
            unlink($unlink_path);

            $user = Auth::user()->username;
            $file = $request->file('image') ;
            $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/company-images' ;
            $file->move($destinationPath,$fileName);
        } else {
            $fileName = $a->image;
        }

        $database_update = DB::table('codebumble_company_list')->where('id', $id)->update(

			[
				'section' => $field['section'],
				'description' => $field['description'],
				'establish_date' => $field['establish_date'],
				'products' => $field['products'],
				'production_cap' => $field['production-cap'],
				'manpower' => $field['manpower'],
				'json_data' => $json_encode,
				'image' => $fileName, 'updated_at' => time(),
				'short_details' => $field['short-details']

			]
		);

        return redirect()->route('all-company',['status' => 'updated']);

    }

    public function delete_company(Request $request,$id){

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        $a = DB::table('codebumble_company_list')->where('id', $id)->first();
        if(isset($a)){
            $b = DB::table('codebumble_company_list')->where('id', $id)->delete();
            return redirect()->route('all-company',['status' => 'success']);
        } else {
            return redirect()->route('all-company',['error' => 1]);
        }



    }


    public function view_all_company_api(){

        if(!Auth::check()){
            header("Location: " . route('profile-account'), true, 302);
            exit();

        }

        $database_details = DB::select('select * from codebumble_company_list');

        return json_encode(["data"=>$database_details]);;





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

    public function auth_view_all_company(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Site Settings"], ['name' => "All Company"]
        ];

        return view('/content/company/all_company', [
            'breadcrumbs' => $breadcrumbs
        ]);

    }

    public function auth_view_edit_company($id){

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }

        $a = DB::table('codebumble_company_list')->where('id', $id)->first();

        if(!isset($a)){
            return redirect()->route('all-company',['error' => 1]);
        }

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Site Settings"], ['link' => "javascript:void(0)", 'name' => "All Company"], [ 'name' => "Edit Company"]
        ];

        $data = DB::table('codebumble_general')->where('code_name', 'sections')->first();

        return view('/content/company/edit_company', [
            'breadcrumbs' => $breadcrumbs,
            'company' => $a,
            'sections' => json_decode($data->value)
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

    public function delete_section($name){

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }
        $z= DB::table('codebumble_company_list')->where('section', base64_decode($name))->first();

        if(isset($z)){
            return redirect()->route('all-section',['error' => 1]);
        }



        $a= DB::table('codebumble_general')->where('code_name', 'sections')->first();
        if(!isset($a)){
            return redirect()->route('all-section',['error' => 1]);
        }


        $b = json_decode($a->value);

        $c = [];

        foreach($b as $bc){
            if(base64_encode($bc->name) != $name ){
                array_push($c, $bc);
            }
        }



        $d = $a= DB::table('codebumble_general')->where('code_name', 'sections')->update(['value' => json_encode($c)]);
        return redirect()->route('all-section',['status' => 1]);

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

    public function auth_view_all_section()
    {
            $a = DB::table('codebumble_general')->where('code_name','sections')->first();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Site Settings"], ['name' => "All Section"]
        ];

        return view('/content/company/all_sector', [
            'breadcrumbs' => $breadcrumbs,
            'sections' => json_decode($a->value)
        ]);
    }
}
