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

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/post-a-job', ['pageConfigs' => $pageConfigs, 'companies' => $companys]);

    }

    public function all_job_list_view(){

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/all-job-list', ['pageConfigs' => $pageConfigs]);

    }

    public function applicant_list_view(){

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/applicant-list', ['pageConfigs' => $pageConfigs]);

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
        $dev['a_information'] = '/images/job-information/'.$fileName2;
        $dev['added_by'] = Auth::user()->username;
        $dev['created_at'] = time();
        $dev['updated_at'] = time();



        $update = DB::table('codebumble_job_list')->insert($dev);

        return redirect()->route('post_a_job_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Job Post Added. The post is now visible', 'hasher_ip' => Str::random(10)]);


    }

    public function view_add_category(){

        $pageConfigs = ['pageHeader' => false];
        return view('/content/career/add_category', ['pageConfigs' => $pageConfigs]);

    }
}
