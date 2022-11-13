<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Company_rest extends Controller
{
    public function add_company(Request $request){

        $field = $request->post();
        // add longitute,latitude, wesite, facebook, instagram
        $check_name = Db::table('codebumble_company_list')->where('name', $field['name'])->first();
        if(isset($check_name->name)){

            return redirect()->route('add-company',['exist' => 1]);

        }


        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }




        $json_encode = [
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
        ];

        if(isset($request['new_center'])){
            $json_encode += [
                'yv_link' => $request['yv_link'],
                'new_center' => $request['new_center'],
                'p_header' => $request['p_header'],
                'ct_title' => $request['ct_title'],
                'ct_desc' => $request['ct_desc']
            ];

        } else {
            $json_encode += [
                'new_center' => 'no'
            ];
        }



        if($file = $request->hasFile('image')) {
            $user = Auth::user()->username;
            $file = $request->file('image') ;
            $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/company-images' ;
            $file->move($destinationPath,$fileName);
        }

        if($file9 = $request->hasFile('dfile')) {
            $user = Auth::user()->username;
            $file9 = $request->file('dfile') ;
            $fileName9 = time().'-'.$user.'.'.$file9->getClientOriginalExtension() ;
            $destinationPath9 = public_path().'/documents/company-documents' ;
            $file9->move($destinationPath9,$fileName9);
        } else {
            $fileName9 = null;
        }

        if($file10 = $request->hasFile('featured_image')) {
            $user = Auth::user()->username;
            $file10 = $request->file('featured_image') ;
            $fileName10 = time().'-'.$user.'.'.$file10->getClientOriginalExtension() ;
            $destinationPath10 = public_path().'/company-images' ;
            $file9->move($destinationPath10,$fileName10);
        } else {
            $fileName10 = null;
        }

        $json_encode += [
            'dfile' => $fileName9,
            'featured_image' => $fileName10,

        ];

        $json_encode = json_encode($json_encode);

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
				'short_details' => null
				]
		);

        return redirect()->route('add-company',['status' => 1]);


    }


	// edit company

    public function edit_company(Request $request, $id){
        $field = $request->post();
        // add longitute,latitude, wesite, facebook, instagram
		//aikhn a error ditese



        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }




        $json_encode = [
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
        ];

        if(isset($request['new_center'])){
            $json_encode += [
                'yv_link' => $request['yv_link'],
                'new_center' => $request['new_center'],
                'p_header' => $request['p_header'],
                'ct_title' => $request['ct_title'],
                'ct_desc' => $request['ct_desc']
            ];

        } else {
            $json_encode += [
                'new_center' => 'no'
            ];
        }



        $a = DB::table('codebumble_company_list')->where('id', $id)->first();

        if($file = $request->hasFile('image')) {
            $check = $request->validate([
                'image.*' => 'mimes:jpeg,png,jpg,svg|max:3080'
            ]);

            $unlink_path= public_path().'/company-images/'.$a->image;
            $user = Auth::user()->username;
            $file = $request->file('image') ;
            $fileName = time().'-'.$user.'.'.$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/company-images' ;
            $file->move($destinationPath,$fileName);
        } else {
            $fileName = $a->image;
        }

        if($file9 = $request->hasFile('dfile')) {
            $user = Auth::user()->username;
            $file9 = $request->file('dfile') ;
            $fileName9 = time().'-'.$user.'.'.$file9->getClientOriginalExtension() ;
            $destinationPath9 = public_path().'/documents/company-documents' ;
            $file9->move($destinationPath9,$fileName9);
        } else {
            if(!isset(json_decode($a->json_data)->dfile)){
                $fileName9 = "";
            } else{
                $fileName9 = json_decode($a->json_data)->dfile;
            }

        }

        if($file10 = $request->hasFile('featured_image')) {
            $user = Auth::user()->username;
            $file10 = $request->file('featured_image') ;
            $fileName10 = time().'-'.$user.'.'.$file10->getClientOriginalExtension() ;
            $destinationPath10 = public_path().'/company-images' ;
            $file10->move($destinationPath10,$fileName10);
        } else {
            if(!isset(json_decode($a->json_data)->featured_image)){
                $fileName10 = "";
            } else{
                $fileName10 = json_decode($a->json_data)->featured_image;
            }

        }

        $json_encode += [
            'dfile' => $fileName9,
            'featured_image' => $fileName10,
        ];

        $json_encode = json_encode($json_encode);



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

    public function view_all_company_frontend_api(){



        $database_details = DB::select('select id,name,image from codebumble_company_list');

        return json_encode($database_details);





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

        if(isset(json_decode($a->json_data)->other_images)){
            return view('/content/company/edit_company', [
                'breadcrumbs' => $breadcrumbs,
                'company' => $a,
                'sections' => json_decode($data->value),
                'imgs' => json_decode($a->json_data)->other_images
            ]);

        } else {
            return view('/content/company/edit_company', [
                'breadcrumbs' => $breadcrumbs,
                'company' => $a,
                'sections' => json_decode($data->value),
                'imgs' => []
            ]);
        }

        return view('/content/company/edit_company', [
            'breadcrumbs' => $breadcrumbs,
            'company' => $a,
            'sections' => json_decode($data->value),
            'imgs' => json_decode($a->json_data)->other_images
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

        if($file10 = $request->hasFile('featured_image')) {
            $user = Auth::user()->username;
            $file10 = $request->file('featured_image') ;
            $fileName10 = time().'-'.$user.'.'.$file10->getClientOriginalExtension() ;
            $destinationPath10 = public_path().'/company-images' ;
            $file10->move($destinationPath10,$fileName10);
        } else {
            $fileName10 = null;
        }

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
                array_push($data, ['name' => $field['name'], 'description' => $field['description'], 'featured_image' => $fileName10]);
                $data = json_encode($data);
                $database = DB::table('codebumble_general')->where('code_name', 'sections')->update(['value' => $data]);
        } else {
                $data = [];
                array_push($data, ['name' => $field['name'], 'description' => $field['description'], 'featured_image' => $fileName10]);
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

    public function edit_section(Request $r,$name){
        $field = $r->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }
        if($name != base64_encode($field['name'])){
            $z= DB::table('codebumble_company_list')->where('section', $field['name'])->first();

            if(isset($z)){
                return redirect()->route('all-section',['error' => 1]);
            }
        }



        $a= DB::table('codebumble_general')->where('code_name', 'sections')->first();
        if(!isset($a)){
            return redirect()->route('all-section',['error' => 1]);
        }


        $b = json_decode($a->value);

        $c = [];

        foreach($b as $bc){
            if(base64_encode($bc->name) == $name ){
                if($file10 = $r->hasFile('featured_image')) {
                    $user = Auth::user()->username;
                    $file10 = $r->file('featured_image') ;
                    $fileName10 = time().'-'.$user.'.'.$file10->getClientOriginalExtension() ;
                    $destinationPath10 = public_path().'/company-images' ;
                    $file10->move($destinationPath10,$fileName10);
                } else if(isset($bc->featured_image)){
                    $fileName10 = $bc->featured_image;
                } else {
                    $fileName10 = null;
                }
                array_push($c, ['name' => $field['name'], 'description' => $field['description'], 'featured_image' => $fileName10]);
            } else {
                array_push($c, $bc);
            }
        }
        if($name != base64_encode($field['name'])){
            $zrar= DB::table('codebumble_company_list')->where('section', base64_decode($name))->update(['section' => $field['name']]);
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

    public function auth_view_edit_section($name)
    {


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Site Settings"], ['name' => "Add Section"]
        ];

        $a= DB::table('codebumble_general')->where('code_name', 'sections')->first();
        if(!isset($a)){
            return redirect()->route('all-section',['error' => 1]);
        }


        $b = json_decode($a->value);

        foreach($b as $bc){
            if(base64_encode($bc->name) == $name ){

                return view('/content/company/edit-sector', [
                    'breadcrumbs' => $breadcrumbs,
                    'data' => $bc
                ]);
            }
        }


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

    public function auth_view_add_photo()
    {
        $data = DB::table('codebumble_company_list')->select('id','name')->get();

    $pageConfigs = ["pageHeader" => false];
    return view("/content/company/add-photo", [
        "pageConfigs" => $pageConfigs, 'companies' => $data
    ]);
    }


    public function add_image_to_company(Request $request){

        check_auth();
		check_power('admin');


        $new= $request->new;

        $counter = 1;

        foreach ($new as $key => $value) {

            $data_get = DB::select('select json_data from codebumble_company_list where id=?', [$value['company']]);
        $a = json_decode($data_get[0]->json_data);

        if(isset($a->other_images)){
            $c = $a->other_images;
        } else {
            $c=[];
        }


            $file2 = $request->file('new.'.$key.'.image') ;
            $fileName2 = time().'-0'.$counter.'0-company-images.'.$file2->getClientOriginalExtension() ;
            $destinationPath2 = public_path().'/images/company-gallery' ;
            $file2->move($destinationPath2,$fileName2);



            $f = [
                "src" => "/images/company-gallery/".$fileName2,
                "name" => $value['name']
            ];

            array_push($c,$f);
            $counter +=1;

            $a->other_images= $c;

        $ok = DB::table('codebumble_company_list')->where('id',$value['company'])->update(['json_data' => json_encode($a),'updated_at' => time()]);

        }



        return redirect()->route('auth_view_add_photo',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Image added to the Gallery. People Can view this image now. Thank You', 'hasher_ip' => Str::random(10)]);

    }

    public function delete_company_image ($id,$company_id){
        check_auth();
		check_power('admin');

        $data_get = DB::select('select json_data from codebumble_company_list where id=?',[$company_id]);
        $z = json_decode($data_get[0]->json_data);
        $a= $z->other_images;
        $b = [];
        foreach ($a as $key => $value) {
            if( $key == $id){
            $unlink_path = public_path().''.$value->src;
            $unlink_path = str_replace("/", "\\", $unlink_path);
            if(file_exists($unlink_path)){
                unlink($unlink_path);
                }

            } else {
                array_push($b, $value);
            }
        }
        $z->other_images = $b;
        $ok = DB::table('codebumble_company_list')->where('id',$company_id)->update(['json_data' => json_encode($z),'updated_at' => time()]);

        return redirect()->route('all-company',['status' => 'updated']);

    }

    public function company_gallery_api($c_id){

        $data_get = DB::select('select json_data from codebumble_company_list where id=?',[$c_id]);
        $z = json_decode($data_get[0]->json_data);
        $a= $z->other_images;

        return json_encode($a);


    }
}
