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

class applicant extends Controller
{
    public function from_receive(Request $request){
        foreach($request->new as $key=>$value){
            if($key != 'university'){
                if($request->new[$key] == "" || $request->new[$key] == null){
                    return redirect("/career-details/5/?data=1"); //field required all
                        }
                    }
        }

        $db_check= DB::select('select * from codebumble_applicant_list where email=? and job_id =?',[$new->email, $new->job_id]);
        if(isset($db_check[0])){
            return json_encode(['error' => 'You have already applied on this job using this Email Address', 'data' => 0]);
        }

        $db_check= DB::select('select * from codebumble_applicant_list where phone=? and job_id =?',[$new->phone, $new->job_id]);
        if(isset($db_check[0])){
            return json_encode(['error' => 'You have already applied on this job using this Phone Number', 'data' => 0]);
        }

        if($file2 = $request->hasFile('new.file-upload')) {

            $vale1 = $request->validate([
                'new.file-upload.*' => 'mimes:pdf,doc,docx|max:10080'
            ]);

            $user2 = Auth::user()->username;
            $file2 = $request->file('new.file-upload');
            $fileName2 = time().'-'.$user2.'.'.$file2->getClientOriginalExtension();
            $destinationPath2 = storage_path().'/app/securefolder' ;
            $file2->move($destinationPath2,$fileName2);

            $new['cv_link'] = '/app/securefolder/'.$fileName2;
            unset($new['file-upload']);




        }
        $new['created_at'] = time();

        $db = $DB::table('codebumble_applicant_list')->insert($new);

        return json_encode(['data' => 1]);






    }
}
