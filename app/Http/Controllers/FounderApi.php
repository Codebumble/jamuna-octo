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
}
