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

class career extends Controller
{
    public function post_a_job_view(){

        check_auth();
        check_power('admin');

        $companys = DB::table('codebumble_company_list')->select('name')->get();
        $category = DB::select('select value from codebumble_front_page where code_name=?', ['job_category']);

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/post-a-job', ['pageConfigs' => $pageConfigs, 'companies' => $companys,  'categories' => json_decode($category[0]->value)]);

    }

    public function edit_a_job_view($id){

        check_auth();
        check_power('admin');



        $selected_company = DB::select('select * from codebumble_job_list where id=?', [$id]);

        $companys = DB::table('codebumble_company_list')->select('name')->get();
        $category = DB::select('select value from codebumble_front_page where code_name=?', ['job_category']);

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/edit-a-job', ['pageConfigs' => $pageConfigs, 'companies' => $companys,  'categories' => json_decode($category[0]->value), 'd' => $selected_company[0]]);

    }

    public function all_job_list_view(){

        check_auth();
        check_power('admin');

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/all-job-list', ['pageConfigs' => $pageConfigs]);

    }

    public function all_job_list_view_api(){

        check_auth();
        check_power('admin');
        $job_list= DB::table('codebumble_job_list')->select('id','name','l_date', 'created_at')->get();
        $job_list = json_decode(json_encode($job_list), true);

        foreach ($job_list as $key => $value) {
            $job_list[$key]['created_at'] = date('d-m-Y', $value['created_at']);

                if((strtotime($job_list[$key]['l_date']) - time()) >= 0){
                    $job_list[$key]['l_date'] = ''.round((strtotime($job_list[$key]['l_date']) - time())/86400).' Days';

                } else {
                    $job_list[$key]['l_date'] = "Expired";
                }

            $job_list[$key] += ["counter" => "12"];
        }



        return json_encode(['data' =>$job_list]);

    }

    public function applicant_list_view(){

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/applicant-list', ['pageConfigs' => $pageConfigs]);

    }

    public function edit_new_job(Request $request){
        check_auth();
        check_power('admin');
        foreach($request->new as $key=>$value){
            if($request->new[$key] == "" || $request->new[$key] == null){
                return redirect()->route('edit_a_job_view',[ 'id'=> $dev['id'],'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Field black Detected.', 'hasher_ip' => Str::random(10)]);
            }
        }



        $dev = $request->new;
        $dbcheck= DB::select('select * from codebumble_job_list where id=?', [$dev['id']]);

        if(!isset($dbcheck[0])){

            return redirect()->route('edit_a_job_view',[ 'id'=> $dev['id'],'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Wrong Id for the Action', 'hasher_ip' => Str::random(10)]);

        }


        if($file1 = $request->hasFile('new.b_image')) {
            $vale = $request->validate([
                'new.b_image.*' => 'mimes:jpg,jpeg,png|max:1080'
            ]);
            $user1 = Auth::user()->username;
            $file1 = $request->file('new.b_image') ;
            $fileName1 = time().'-'.$user1.'.'.$file1->getClientOriginalExtension() ;
            $destinationPath1 = public_path().'/images/job-background' ;
            $file1->move($destinationPath1,$fileName1);

            unset($dev['b_image']);
            $dev['b_image'] = '/images/job-background/'.$fileName1;



        }

        if($file2 = $request->hasFile('new.a_information')) {

            $vale1 = $request->validate([
                'new.a_information.*' => 'mimes:pdf,doc,docx|max:10080'
            ]);

            $user2 = Auth::user()->username;
            $file2 = $request->file('new.a_information');
            $fileName2 = time().'-'.$user2.'.'.$file2->getClientOriginalExtension();
            $destinationPath2 = public_path().'/documents/job-information' ;
            $file2->move($destinationPath2,$fileName2);

            unset($dev['a_information']);
            $dev['a_information'] = '/documents/job-information/'.$fileName2;


        }





        $dev['updated_at'] = time();



        $update = DB::table('codebumble_job_list')->where('id', $dev['id'])->update($dev);

        return redirect()->route('edit_a_job_view',['id'=> $dev['id'], 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Job Post Edited. The post is now visible', 'hasher_ip' => Str::random(10)]);


    }

    public function delete_new_job($id){
        check_auth();
        check_power('admin');

        $dbcheck= DB::select('select * from codebumble_job_list where id=?', [$id]);
        $link=public_path().''.$dbcheck[0]->b_image;
        $link= str_replace("/", "\\", $link);
        unlink($link);
        $link1=public_path().''.$dbcheck[0]->a_information;
        $link1= str_replace("/", "\\", $link1);
        unlink($link1);

        DB::table('codebumble_job_list')->where('id', $id)->delete();

        return redirect()->route('all_job_list_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Job Post Added. The post is now visible', 'hasher_ip' => Str::random(10)]);










    }

    public function add_new_job(Request $request){
        check_auth();
        check_power('admin');
        foreach($request->new as $key=>$value){
            if($request->new[$key] == "" || $request->new[$key] == null){
                return redirect()->route('post_a_job_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Product Added!! This Product is now Visible in The website.', 'hasher_ip' => Str::random(10)]);
            }
        }

        $dev = $request->new;

        if($file1 = $request->hasFile('new.b_image')) {
            $vale = $request->validate([
                'new.b_image.*' => 'mimes:jpg,jpeg,png|max:1080'
            ]);
            $user1 = Auth::user()->username;
            $file1 = $request->file('new.b_image') ;
            $fileName1 = time().'-'.$user1.'.'.$file1->getClientOriginalExtension() ;
            $destinationPath1 = public_path().'/images/job-background' ;
            $file1->move($destinationPath1,$fileName1);



        } else {
            return redirect()->route('post_a_job_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'No Background Image Found. Please Try One.', 'hasher_ip' => Str::random(10)]);
        }

        if($file2 = $request->hasFile('new.a_information')) {

            $vale1 = $request->validate([
                'new.a_information.*' => 'mimes:pdf,doc,docx|max:10080'
            ]);

            $user2 = Auth::user()->username;
            $file2 = $request->file('new.a_information');
            $fileName2 = time().'-'.$user2.'.'.$file2->getClientOriginalExtension();
            $destinationPath2 = public_path().'/documents/job-information' ;
            $file2->move($destinationPath2,$fileName2);


        } else {

            return redirect()->route('post_a_job_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'No Document Found. Please Try One.', 'hasher_ip' => Str::random(10)]);
        }

        unset($dev['b_image']);
        $dev['b_image'] = '/images/job-background/'.$fileName1;
        unset($dev['a_information']);
        $dev['a_information'] = '/documents/job-information/'.$fileName2;
        $dev['added_by'] = Auth::user()->username;
        $dev['created_at'] = time();
        $dev['updated_at'] = time();



        $update = DB::table('codebumble_job_list')->insert($dev);

        return redirect()->route('post_a_job_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Job Post Added. The post is now visible', 'hasher_ip' => Str::random(10)]);


    }

    public function view_add_category(){
        check_auth();
        check_power('admin');



        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/add_category', ['pageConfigs' => $pageConfigs]);

    }

    public function add_new_category(Request $request){
        check_auth();
        check_power('admin');

        $field = $request->validate([
            'name' => 'required|string',
            'icon' => 'required|string'
        ]);

        $last_data = DB::table('codebumble_front_page')->where('code_name', 'job_category')->first();

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
                    return redirect()->route('view_add_category',['exist' => 1]);
                }
                array_push($data, ['name' => $field['name'], 'icon' => $field['icon']]);
                $data = json_encode($data);
                $database = DB::table('codebumble_front_page')->where('code_name', 'job_category')->update(['value' => $data]);
        } else {
                $data = [];
                array_push($data, ['name' => $field['name'], 'icon' => $field['icon']]);
                $data = json_encode($data);
                $database = DB::table('codebumble_front_page')->insert(['code_name'=> 'job_category', 'value' => $data]);
        }



        return redirect()->route('view_add_category',['status' => 1]);

    }

    public function view_list_category(){
        check_auth();
        check_power('admin');

        $data = DB::select('select value from codebumble_front_page where code_name=?', ['job_category']);

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/list_category', ['pageConfigs' => $pageConfigs, 'sections' => json_decode($data[0]->value)]);

    }

    public function delete_category($name){
        check_auth();
        check_power('admin');

        $z= DB::table('codebumble_job_list')->where('sector', base64_decode($name))->first();

        if(isset($z)){
            return redirect()->route('view_list_category',['error' => 1]);
        }



        $a= DB::table('codebumble_front_page')->where('code_name', 'job_category')->first();
        if(!isset($a)){
            return redirect()->route('view_list_category',['error' => 1]);
        }


        $b = json_decode($a->value);

        $c = [];

        foreach($b as $bc){
            if(base64_encode($bc->name) != $name ){
                array_push($c, $bc);
            }
        }



        $d = DB::table('codebumble_front_page')->where('code_name', 'job_category')->update(['value' => json_encode($c)]);
        return redirect()->route('view_list_category',['status' => 1]);


    }
}
