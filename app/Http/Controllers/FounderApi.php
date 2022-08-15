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

class FounderApi extends Controller
{

    public function founder_speech_breadcrumb(){
        $data_get = DB::select('select * from codebumble_founder_page');

        $all_data = [];

        foreach($data_get as $data_getam){
            if($data_getam->code_name == "breadcrumb"){
                $all_data['breadcrumb'] = json_decode($data_getam->value);
            } else if($data_getam->code_name == "FounderDetails"){
                $all_data['FounderDetails'] = json_decode($data_getam->value);
            } else if($data_getam->code_name == "quote"){
                $all_data['quote'] = json_decode($data_getam->value);
            }
        }

        return json_encode($all_data);


    }

    public function founder_update_api(Request $request){
        $field = $request->validate([
            'title-FounderDetails' => 'required|string',
            'description-FounderDetail'=>'required|string',
            'title-breadcrumb'=>'required|string',
            'pageDesc-breadcrumb'=>'required|string',
            'quote-cite' =>'required|string',
            'quote-status'=>'required|string',
            'quote-quote'=>'required|string'
        ]);

        if($file1 = $request->hasFile('image')) {
            $field1 = $request->validate([
                'image.*' => 'mimes:png,jpg,jpeg|max:1080',
            ]);
            $file1 = $request->file('image') ;
            $fileName1 = time().'-founder-speech.'.$file1->getClientOriginalExtension() ;
            $destinationPath1 = public_path().'/profile-images' ;
            $file1->move($destinationPath1,$fileName1);

        } else {
            $db_check = DB::table('codebumble_founder_page')->where('code_name', 'quote')->get();

            $fileName1 = json_decode($db_check->value)->imgSrc;
        }

        $db_update_1 = DB::table('codebumble_founder_page')->where('code_name', 'quote')->update(['value'=>json_encode(['imgSrc' => $fileName1, 'quote' => $field['quote-quote'], 'cite' => $field['quote-cite'], 'status' => $field['quote-status']])]);

        $db_update_2 = DB::table('codebumble_founder_page')->where('code_name', 'FounderDetails')->update(['value'=>json_encode(['title' => $field['title-FounderDetails'], 'description' => $field['description-FounderDetail']])]);

        $db_update_3 = DB::table('codebumble_founder_page')->where('code_name', 'breadcrumb')->update(['value'=>json_encode(['pageTitle' => $field['title-breadcrumb'], 'pageDesc' => $field['pageDesc-breadcrumb']])]);

        return redirect()->route('founder-page-view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You', 'hasher_ip' => Str::random(10)]);

    }

}
