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

class siteGeneral extends Controller
{
    public function general_page_view(){

        $pageConfigs = ['pageHeader' => false];
        $db_data = DB::table('codebumble_general')->get();

        $site_name= null;
        $site_moto = null;
        $social_media = null;
        $site_url=null;
        $site_logo=null;
        $support_email=null;

        foreach($db_data as $datam){
            if($datam->code_name == "site_name"){
                $site_name = $datam->value;
            }

            if($datam->code_name == "site_moto"){
                $site_moto = $datam->value;
            }

            if($datam->code_name == "social_media"){
                $social_media = $datam->value;
            }

            if($datam->code_name == "site_url"){
                $site_url = $datam->value;
            }

            if($datam->code_name == "site_logo"){
                $site_logo = $datam->value;
            }

            if($datam->code_name == "support_email"){
                $support_email = $datam->value;
            }
        }



        // $site_name= null;
        // $site_moto = null;
        // $social_media = null;
        // $site_url=null;
        // $site_logo=null;
        // $support_email=null;

        return view('/content/site-settings/general-settings', ['pageConfigs' => $pageConfigs, 'site_name' => $site_name, 'site_moto' => $site_moto, 'social_media' => json_decode($social_media), 'site_url' => $site_url, 'site_logo' => $site_logo, 'support_email' => $support_email]);
    }
}
